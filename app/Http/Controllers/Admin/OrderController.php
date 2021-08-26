<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
     * Display a listing of the resource.
     *
     * @return RedirectResponse|Response
     */
    public function checkout(): Response|RedirectResponse {
        return cartCount() ? response()->view('checkout') : back()->with('toast_info', 'Your cart is empty.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        $orderData = $request->all();

        $validation = Validator::make($request->all(), [
            'phone' => ['required', 'numeric', 'digits_between:9,12'],
            'pay_method' => 'present|required',
        ], [
            'phone.regex' => 'The phone number is invalid.',
            'pay_method.required' => 'Please select a payment method.'
        ]);

        if($validation->fails()) return back()->withInput()->with('toast_warning', $validation->messages()->first());

        $orderData['phone'] = strlen($orderData['phone']) > 9 ? substr($orderData['phone'], -9) : $orderData['phone'];
        $orderData['total'] = cartTotal();

        try {
            DB::transaction(function() use ($orderData) {
                $orderData['order_no'] = 'NFC0' . DB::select("SHOW TABLE STATUS LIKE 'orders'")[0]->Auto_increment;
                $order = Auth::user()->orders()->create($orderData);

                foreach(cartItems() as $id => $item) {
                    $item['product_id'] = $id;
                    $item['details'] = json_encode(Arr::only($item, ['discount']));

                    Product::find($id)->decrement('stock', $item['quantity']);

                    $order->orderProducts()->create($item);
                }
            });

            Session::forget('cart');

            return createOk(null, 'order.thanks','Order placed successfully!');
        } catch(Throwable $e) {
            return toastError($e->getMessage(), 'Unable to place order.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response {
        $data = [
            'order' => Order::with(['orderProducts', 'user'])->withCount('orderProducts')->find($id)
        ];

        return response()->view('admin.orders.show', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int|null $id
     * @return Response
     */
    public function thanks(int $id = null): Response {
        return response()->view('thanks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int    $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     */
    public function updateStatus(Request $request, int $id): RedirectResponse {
        try {
            $order = Order::find($id);
            $order->status = $request->input('status');
            $order->save();

            return updateOk('Status update Successful!');
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to update order status.');
        }
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
