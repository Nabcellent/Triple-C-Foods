<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response {
        $data['products'] = Product::all();

        return response()->view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response {
        return response()->view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse {
        $data = $request->all();

        $file = $request->file('image');
        $data['image'] = "foo_" . time() . ".{$file->guessClientExtension()}";
        $file->move(public_path('images/kuku'), $data['image']);

        try {
            $model = DB::transaction(function() use ($data) {
                return Product::create($data)->getTable();
            });

            return createOk($model, 'admin.kitchen.index');
        } catch(Throwable $e) {
            return toastError($e->getMessage(), 'Unable to create new product');
        }
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
     * @param  int    $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
