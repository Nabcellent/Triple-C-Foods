<?php

use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;

function isAdmin():bool {
    return Auth::user()->is_admin || isRed();
}
function isRed():bool {
    return Auth::user()->is_admin === 7;
}

function createOk($model = null, $routeName = null, $msg = 'Successfully created!'): RedirectResponse {
    $msg = $model ? $model . ' ' . $msg : $msg;

    return goWithSuccess($routeName, __($msg));
}
function deleteOk($msg = 'Successfully deleted.', $routeName = null): RedirectResponse {
    return goWithSuccess($routeName, __($msg));
}
function updateOk($msg = 'Update successful!', $routeName = null): RedirectResponse {
    return goWithSuccess($routeName, __($msg));
}
function goWithSuccess($to, $msg): RedirectResponse {
    $route = $to ? goToRoute($to) : back();

    return $route->with('toast_success', $msg);
}
function goWithDanger($to = 'dashboard', $msg = NULL): RedirectResponse {
    $msg = $msg ?: __('Something went wrong!');
    return goToRoute($to)->with('sweet_danger', $msg);
}

function toastInfo($clientMessage): RedirectResponse {
    return back()->withInput()->with('toast_info', __($clientMessage));
}

function toastError($serverError, $clientMessage): RedirectResponse {
    Log::error($serverError);

    return back()->withInput()->with('toast_error', __($clientMessage));
}

function goToRoute($goto): RedirectResponse {
    $data = [];
    $to = (is_array($goto) ? $goto[0] : $goto) ?: 'dashboard';

    if(is_array($goto)){
        array_shift($goto);
        $data = $goto;
    }

    if(!Route::has($to)) {
        $to = app('router')->getRoutes()->match(app('request')->create($to))->getName();
    }

    return app('redirect')->to(route($to, $data));
}

function cartCount(): int|string {
    return (count((array) session('cart')) === 0 ? '' : count((array) session('cart')));
}

function cartTotal(): int|string {
    $total = 0;

    foreach((array) session('cart') as $details)
        $total += $details['price'] * $details['quantity'];

    return ($total === 0) ? '' : $total;
}

function cartItems(): array {
    return Session::get('cart');
}


function calcDiscountPrice($product): int {
    if($product->discount > 0) {
        $discountPrice = $product->price - ($product->price * $product->discount / 100);
    }

    return $discountPrice ?? 0;
}

function orderStatuses(): array {
    return [
        'pending',
        'in process',
        'hold',
        'completed',
        'cancelled',
        'delivered',
    ];
}
