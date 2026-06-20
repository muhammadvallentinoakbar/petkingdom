<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * HALAMAN PAYMENT
     */
    public function index($orderId)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('payment.index', compact('order'));
    }

    /**
     * PROSES UPLOAD / PAYMENT METHOD
     */
    public function upload(Request $request, $orderId)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $order = Order::where('user_id', Auth::id())
            ->findOrFail($orderId);

        $method = $request->payment_method;
        $path = null;

        // upload bukti jika ada
        if ($request->hasFile('payment_proof')) {

            $request->validate([
                'payment_proof' => 'image|max:2048'
            ]);

            $path = $request->file('payment_proof')
                ->store('payment', 'public');
        }

        /**
         * =========================
         * PAYMENT LOGIC
         * =========================
         */

        // COD
        if ($method === 'cod') {

            $order->update([
                'payment_method' => 'cod',
                'payment_proof' => null,
                'status' => 'processing'
            ]);
        }

        // QRIS (anggap langsung paid)
        elseif ($method === 'qris') {

            $order->update([
                'payment_method' => 'qris',
                'payment_proof' => $path,
                'status' => 'paid'
            ]);
        }

        // TRANSFER BANK
        else {

            $order->update([
                'payment_method' => 'transfer',
                'payment_proof' => $path,
                'status' => 'paid'
            ]);
        }

        /**
         * REDIRECT KE SUCCESS PAGE
         */
        return redirect()->route('payment.success', $order->id)
            ->with('success', 'Pembayaran berhasil diproses');
    }

    /**
     * =========================
     * HALAMAN SUCCESS
     * =========================
     */
    public function success($orderId)
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('payment.success', compact('order'));
    }
}