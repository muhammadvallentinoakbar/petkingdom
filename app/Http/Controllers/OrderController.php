<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * LIST ORDER USER
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            abort(404);
        }

        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * DETAIL ORDER USER
     */
    public function show($id)
    {
        if (Auth::user()->role === 'admin') {
            abort(404);
        }

        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * TRACKING ORDER
     */
    public function tracking($id)
    {
        if (Auth::user()->role === 'admin') {
            abort(404);
        }

        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('orders.tracking', compact('order'));
    }
}