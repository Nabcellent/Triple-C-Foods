<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): Factory|View|Application {
        $data = [
            'products' => Product::paginate(10),
        ];

        return view('products', $data);
    }

    public function show($id): View|Factory|Application|RedirectResponse {
        try {
            $data['product'] = Product::findOrFail($id);

            return view('details', $data);
        } catch(Exception $e) {
            return toastError($e->getMessage(), 'Unable to retrieve product.');
        }
    }
}
