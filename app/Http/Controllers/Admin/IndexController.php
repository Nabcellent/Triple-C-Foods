<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function index(): Factory|View|Application {
        /*$images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $randomImage = $images[array_rand($images)]; // See comments
        dd($randomImage);*/
        $data = [
            'newUsers' => User::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}
