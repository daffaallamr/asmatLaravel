<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $rules = [
            'nama'                  => 'required|min:5|max:30|unique:products,nama',
            'harga'         => 'required|',
            'berat'         => 'required|',
            'deskripsi'         => 'required|min:30|',
            'stok'         => 'required|',
            'produsen'         => 'required|',
            'gambar'         => 'required|',
        ];
 
        $messages = [
            'nama.required'   => 'Nama produk wajib diisi',
            'nama.unique'          => 'Nama produk sudah terdaftar',
            'nama.min'        => 'Nama produk minimal 5 karakter',
            'nama.max'        => 'Nama produk maksimal 30 karakter',
            'harga.required'    => 'Harga wajib diisi',
            'berat.required' => 'Berat wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.min'      => 'Deskripsi minimal 30 karakter',
            'stok.required' => 'Stok wajib diisi',
            'produsen.required' => 'Nama produsen wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $imageName = Auth::id() . time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName); 

        $product = new Product;
        $product->nama = $request->nama;
        $product->slug = Str::slug($request->nama, '-');
        $product->harga = $request->harga;
        $product->berat = $request->berat;
        $product->deskripsi = $request->deskripsi;
        $product->stok = $request->stok;
        $product->gambar = $imageName;
        $product->produsen = $request->produsen;
        $product->nomer_izin = $request->nomer_izin;
        $product->save();

        return redirect()->route('adminProduct.index');

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
        $rules = [
            'nama'                  => 'required|min:5|max:30',
            'harga'         => 'required|',
            'berat'         => 'required|',
            'deskripsi'         => 'required|min:30|',
            'stok'         => 'required|',
        ];
 
        $messages = [
            'nama.required'   => 'Nama produk wajib diisi',
            'nama.min'        => 'Nama produk minimal 5 karakter',
            'nama.max'        => 'Nama produk maksimal 30 karakter',
            'harga.required'    => 'Harga wajib diisi',
            'berat.required' => 'Berat wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.min'      => 'Deskripsi minimal 30 karakter',
            'stok.required' => 'Stok wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->gambar == null) {
            $product = Product::findOrFail($id);
            $product->nama = $request->nama;
            $product->slug = Str::slug($request->nama, '-');
            $product->harga = $request->harga;
            $product->berat = $request->berat;
            $product->deskripsi = $request->deskripsi;
            $product->stok = $request->stok;
            $product->save();
        } else {
            $imageName = Auth::id() . time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName); 

            $product = Product::findOrFail($id);
            $product->nama = $request->nama;
            $product->slug = Str::slug($request->nama, '-');
            $product->harga = $request->harga;
            $product->berat = $request->berat;
            $product->deskripsi = $request->deskripsi;
            $product->stok = $request->stok;
            $product->gambar = $imageName;
            $product->save();
        }

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
