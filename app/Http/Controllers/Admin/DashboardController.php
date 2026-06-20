<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomer = User::count();

        $totalProduct = Product::count();

        $totalOrder = Order::count();

        $totalIncome = Order::where('payment_status', 'paid')
            ->sum('total');

        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalCustomer' => $totalCustomer,
            'totalProduct'  => $totalProduct,
            'totalOrder'    => $totalOrder,
            'totalIncome'   => $totalIncome,
            'latestOrders'  => $latestOrders,
        ]);
    }
}