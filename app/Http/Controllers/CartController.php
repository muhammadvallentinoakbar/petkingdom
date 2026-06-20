<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * TAMBAH KE CART (ADD TO CART)
     */
    public function add($productId)
    {
        // cek product
        $product = Product::findOrFail($productId);

        // cek cart user apakah sudah ada product ini
        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            // kalau sudah ada → tambah quantity +1
            $cart->quantity += 1;
            $cart->save();
        } else {
            // kalau belum ada → buat baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    /**
     * LIHAT CART USER
     */
    public function index()
{
    $carts = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    $subtotal = 0;

    foreach ($carts as $cart) {
        $subtotal += $cart->product->price * $cart->quantity;
    }

    $shipping = 10000;
    $total = $subtotal + $shipping;

    return view('cart.index', compact('carts', 'subtotal', 'shipping', 'total'));
}

    /**
     * UPDATE JUMLAH CART
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Cart berhasil diupdate');
    }

    /**
     * HAPUS ITEM CART
     */
    public function delete($id)
    {
        $cart = Cart::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $cart->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }

    /**
     * KOSONGKAN CART
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Keranjang dikosongkan');
    }
}