<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response {
        $data = [
            'orders' =>Order::with('user')->withCount('orderProducts')->latest()->paginate(10)
        ];

        return response()->view('admin.orders.index', $data);
    }
}
