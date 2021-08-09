<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::prefix('/cart')->name('cart.')->group(function() {
        Route::get('/', [CartController::class, 'index'])->name('index');
    });
});

Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::prefix('/users')->name('users.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/orders')->name('orders.')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
    });
});

require __DIR__ . '/auth.php';
