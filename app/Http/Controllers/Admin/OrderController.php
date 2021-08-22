<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse {
        try {
            Order::destroy($id);

            return back()->with('toast_success', 'Product deleted.');
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to delete order');
        }
    }
}
