<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response {
        return response()->view('cart');
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
     * @param         $id
     * @return RedirectResponse
     */
    public function store(Request $request, $id): RedirectResponse {
        $product = Product::findOrFail($id);

        $cart = Session::get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity');
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "quantity" => $request->input('quantity'),
                "price" => $product->price,
                "image" => $product->image,
                'created_at' => now()
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('toast_success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
     */
    public function update(Request $request) {
        if($request->input('id') && $request->input('quantity')){
            $cart = Session::get('cart');
            $cart[$request->input('id')]["quantity"] = $request->input('quantity');

            session()->put('cart', $cart);
            session()->flash('toast_success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request) {
        if($request->input('id')) {
            $cart = Session::get('cart');

            if(isset($cart[$request->input('id')])) {
                unset($cart[$request->input('id')]);
                session()->put('cart', $cart);
            }

            session()->flash('toast_success', 'Product removed successfully');
        }
    }
}
