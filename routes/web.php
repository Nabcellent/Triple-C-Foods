<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductsImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('/products')->name('products.')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/details/{id}', [ProductController::class, 'show'])->name('show');
    });

    /**  USER ROUTES  **/
    Route::prefix('/user')->name('user.')->group(function() {
        Route::get('/profile', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('/cart')->name('cart.')->group(function() {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/store/{id}', [CartController::class, 'store'])->name('store');
        Route::patch('/update', [CartController::class, 'update'])->name('update');
        Route::delete('/destroy', [CartController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/checkout')->name('order.')->group(function() {
        Route::get('/',[OrderController::class, 'checkout'])->name('index');
        Route::post('/place-order',[OrderController::class, 'store'])->name('store');
        Route::get('/thanks', [OrderController::class, 'thanks'])->name('thanks');
    });
});


Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::prefix('/kitchen')->name('kitchen.')->group(function() {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('destroy');

        Route::prefix('/image')->name('image.')->group(function() {
            Route::post('/store', [ProductsImageController::class, 'store'])->name('store');
            Route::delete('/destroy/{id?}', [ProductsImageController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/update-profile/{id}', [AdminUserController::class, 'updateProfile'])->name('update.profile');
        Route::put('/update-password/{id}', [AdminUserController::class, 'updatePassword'])->name('update.password');
        Route::get('/destroy/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
    });

    /**  ORDER ROUTES  **/
    Route::prefix('/orders')->name('orders.')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
        Route::patch('/update-status/{id}', [OrderController::class, 'updateStatus'])->name('update.status');
        Route::get('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
