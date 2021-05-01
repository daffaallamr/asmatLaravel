<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all()->take(3);
        $stories = Story::all()->take(2);

        $user = Auth::id();

        return view('index', [
            'products' => $products,
            'stories' => $stories,
            'user' => $user,
        ]);
    }
}
