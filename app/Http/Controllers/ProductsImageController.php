<?php

namespace App\Http\Controllers;

use App\Models\ProductsImage;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ProductsImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse {
        $data = $request->except(['_token', 'images']);
        $images = $request->file('images');

        try {
            DB::transaction(function() use ($images, $data) {
                foreach($images as $image) {
                    $data['image'] = "thumb_" . strtolower(Str::random(7)) . ".{$image->guessClientExtension()}";
                    $image->move(public_path('images/kuku'), $data['image']);

                    ProductsImage::create($data);
                }
            });

            return response()->json('success', 200);
        } catch(Throwable | Exception $e) {
            return response()->json(['error', 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ProductsImage $productsImage
     * @return Response
     */
    public function show(ProductsImage $productsImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductsImage $productsImage
     * @return Response
     */
    public function edit(ProductsImage $productsImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request       $request
     * @param ProductsImage $productsImage
     * @return Response
     */
    public function update(Request $request, ProductsImage $productsImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse {
        if($productImage = ProductsImage::findOrFail($id)) {
            if($productImage->image && file_exists(public_path('images/kuku/' . $productImage->image))) {
                unlink(public_path('images/kuku/' . $productImage->image));
            }

            $productImage->delete();

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to delete image.'], 400);
        }
    }
}
