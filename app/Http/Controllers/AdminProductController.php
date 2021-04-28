<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.produk.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $imageName = Auth::id() . time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName); 

        $product = new Product;
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->berat = $request->berat;
        $product->deskripsi = $request->deskripsi;
        $product->stok = $request->stok;
        $product->gambar = $imageName;
        $product->save();

        return redirect()->route('adminProduct.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.produk.editData', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageName = Auth::id() . time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName); 

        $product = Product::where('id', $id)->first();
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->berat = $request->berat;
        $product->deskripsi = $request->deskripsi;
        $product->stok = $request->stok;
        $product->gambar = $imageName;
        $product->save();

        return redirect()->route('adminProduct.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('adminProduct.index');
    }
}
