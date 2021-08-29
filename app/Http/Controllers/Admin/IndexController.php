<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
    public function index(): Factory|View|Application {
        $data = [
            'newUsers' => User::where('id', '!=', 1)->latest()->take(5)->get(),
            'newOrders' => Order::with('user')->latest()->take(5)->get(),
            'totalStock' => Product::sum('stock'),
            'monthsUsers' => User::where('id', '!=', 1)
                ->whereBetween('created_at', [now()->startOfMonth(), now()])->count(),
            'monthsOrders' => Order::whereBetween('created_at', [now()->startOfMonth(), now()])->count(),
            'monthsMoney' => Order::whereIn('status', ['completed', 'delivered'])
                ->whereBetween('created_at', [now()->startOfMonth(), now()])->sum('total'),
        ];

        return view('admin.dashboard', $data);
    }
}
