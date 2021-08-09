<?php

use Illuminate\Http\RedirectResponse;

function isAdmin():bool {
    return Auth::user()->is_admin;
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
    $msg = $msg ? $msg : __('msg.rnf');
    return goToRoute($to)->with('sweet_danger', $msg);
}

function returnToastError($serverError, $clientMessage): RedirectResponse {
    Log::error($serverError);

    return back()->withInput()
        ->with('toast_error', __($clientMessage));
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
