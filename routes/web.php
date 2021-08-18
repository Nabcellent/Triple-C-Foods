<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
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
        Route::get('/view/{id}', [ProductController::class, 'show'])->name('show');
    });

    Route::prefix('/cart')->name('cart.')->group(function() {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/store/{id}', [CartController::class, 'store'])->name('store');
        Route::patch('/update', [CartController::class, 'update'])->name('update');
        Route::delete('/destroy', [CartController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::prefix('/kitchen')->name('kitchen.')->group(function() {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('store');
        Route::get('/show', [AdminProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update.profile');
        Route::put('/update-password/{id}', [UserController::class, 'updatePassword'])->name('update.password');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/orders')->name('orders.')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
    });
});

require __DIR__ . '/auth.php';
