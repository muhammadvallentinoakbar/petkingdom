<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * LIST SEMUA ORDER
     */
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * DETAIL ORDER
     */
    public function show($id)
    {
        $order = Order::with('items.product', 'user')
            ->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * UPDATE STATUS ORDER (SHIPPING STATUS)
     */
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,processing,shipped,completed'
    ]);

    $order = Order::findOrFail($id);

    $order->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Status berhasil diupdate!');
}

    /**
     * UPDATE PAYMENT STATUS
     */
public function updatePaymentStatus(Request $request, $id)
{
    $request->validate([
        'payment_status' => 'required|in:pending,paid,rejected'
    ]);

    $order = Order::findOrFail($id);

    $order->update([
        'payment_status' => $request->payment_status
    ]);

    return back()->with(
        'success',
        'Status pembayaran berhasil diupdate'
    );
}
    public function updateShipping(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $request->validate([
        'shipping_status' => 'required|string'
    ]);

    $order->update([
        'shipping_status' => $request->shipping_status
    ]);

    return back()->with('success', 'Status pengiriman berhasil diupdate!');
}
public function destroy($id)
{
    $order = Order::findOrFail($id);

    // Hapus item pesanan terlebih dahulu
    $order->items()->delete();

    // Hapus order
    $order->delete();

    return redirect()
        ->route('admin.orders.index')
        ->with('success', 'Pesanan berhasil dihapus');
}
}