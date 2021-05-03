<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsCache = Cache::remember('semua-cerita-cache', 10, function() {
            return Product::all();
        });
        
        return view ('product.belanja', ['products' => $productsCache]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.detail', [
            'product' => Product::findOrFail($id)
        ]);
    }
}
