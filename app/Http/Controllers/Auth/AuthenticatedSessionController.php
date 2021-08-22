<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create(): View {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse {
        $request->authenticate();

        $request->session()->regenerate();

        $this->authenticated($request);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    protected function authenticated(Request $request) {
        //  Update user cart with user id

        $cartItems = Cart::where('user_id', Auth::id());

        if($cartItems->count()) {
            $cart = $cartItems->get()->mapWithKeys(function($item, $key) {
                $item->title = $item->product->title;
                $item->image = $item->product->image;

                return [$item->product_id => $item->toArray()];
            })->toArray();

            $cartItems->delete();

            Session::put('cart', $cart);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse {
        if(!empty(Session::get('cart'))) {
            foreach(Session::get('cart') as $id => $item) {
                $item['product_id'] = $id;
                $item['details'] = json_encode(Arr::only($item, ['title']));
                $attributes = Arr::only($item, ['product_id', 'details', 'quantity', 'price', 'created_at']);

                Auth::user()->cart()->create($attributes);
            }
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
