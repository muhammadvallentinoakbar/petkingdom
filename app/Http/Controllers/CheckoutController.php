<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
// BLOKIR ADMIN
    if ($user->role === 'admin') {
        abort(404);
    }
        $carts = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang masih kosong');
        }

        // 🔥 AMBIL DATA DARI FORM
        $method = $request->payment_method;

        $address = $request->address;
        $city = $request->city;
        $postal = $request->postal_code;

        // 🔥 HITUNG TOTAL
        $subtotal = 0;

        foreach ($carts as $cart) {
            $subtotal += $cart->product->price * $cart->quantity;
        }

        $shipping = 10000;
        $total = $subtotal + $shipping;

        // 🚚 VALIDASI COD
        if ($method === 'cod') {

            if (!$address || !$city || !$postal) {
                return back()->with('error', 'Alamat COD wajib diisi');
            }
        }

        // 🔥 STATUS LOGIC
        $status = 'pending';

        if ($method === 'cod') {
            $status = 'processing';
        }

        // 🔥 CREATE ORDER
        $order = Order::create([
            'user_id' => $user->id,
            'invoice' => 'INV-' . time(),
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping,
            'total' => $total,

            'payment_method' => $method,
            'address' => $address,
            'city' => $city,
            'postal_code' => $postal,

            'status' => $status,
        ]);

        // ORDER ITEMS
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
                'subtotal' => $cart->product->price * $cart->quantity,
            ]);
        }

        // CLEAR CART
        Cart::where('user_id', $user->id)->delete();

        // REDIRECT KE PAYMENT
        return redirect()->route('payment.index', $order->id)
            ->with('success', 'Checkout berhasil');
    }
}