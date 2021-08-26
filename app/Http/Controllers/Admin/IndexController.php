<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function index(): Factory|View|Application {
        $data = [
            'newUsers' => User::latest()->take(5)->get(),
            'newOrders' => Order::with('user')->latest()->take(5)->get(),
            'totalStock' => Product::sum('stock'),
            'todaysUsers' => User::whereDate('created_at', now()->toDateString())->count(),
            'todaysOrders' => Order::whereDate('created_at', now()->toDateString())->count(),
            'todaysMoney' => Order::whereIn('status', ['completed', 'delivered'])->whereDate('created_at', now()->toDateString())->sum('total'),
        ];

        return view('admin.dashboard', $data);
    }
}
