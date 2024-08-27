<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRenters = User::where('role', 'penyewa')->count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');
        $totalProducts = Product::count();
        $recentOrders = Order::with('user', 'orderItems.product')
                             ->orderBy('created_at', 'desc')
                             ->take(5)
                             ->get();

        return view('admin.dashboard', compact(
            'totalRenters',
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'recentOrders'
        ));
    }
}
