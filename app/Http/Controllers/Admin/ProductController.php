<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\User;
use Exception;
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
        $data['products'] = Product::latest()->paginate(10);

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
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function show(int $id): Response|RedirectResponse {
        try {
            $data = [
                'product' => Product::with('productImages')->findOrFail($id),
                'otherProducts' => Product::where('id', '<>', $id)->latest()->take(4)->get()
            ];

            return response()->view('admin.products.show', $data);
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to find product');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response {
        $data = ['product' => Product::find($id)];

        return response()->view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param int                 $id
     * @return RedirectResponse
     */
    public function update(StoreProductRequest $request, int $id): RedirectResponse {
        $data = $request->all();

        try {
            $product = Product::find($id);

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $data['image'] = "foo_" . time() . ".{$file->guessClientExtension()}";
                $file->move(public_path('images/kuku'), $data['image']);

                if($product->image && file_exists(public_path('images/kuku/' . $product->image)))
                    unlink(public_path('images/kuku/' . $product->image));
            }

            DB::transaction(function() use ($product, $data) {
                $product->update($data);
            });

            return updateOk('Product updated successfully', 'admin.kitchen.index');
        } catch(Throwable $e) {
            return toastError($e->getMessage(), 'Unable to create new product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse {
        if(Product::destroy($id)) {
            return back()->with('toast_success', 'Product deleted.');
        } else {
            return toastError('unable to delete product', 'Unable to delete product');
        }
    }
}
