<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('product.belanja', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        $orderSementara = new Order();
        $orderDetail = new OrderDetail();

        $hasData = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();

        if (!empty ($hasData)) {
            $orderSementara = $hasData;

            // order detail yang sudah ada
            $orderDetailLama = OrderDetail::where('order_id', $orderSementara->id)->where('produk_id', $request->produk_id)->first();

            if (empty($orderDetailLama)) {
                $newOrderDetail = new OrderDetail;

                $newOrderDetail->produk_id = $request->produk_id;
                $newOrderDetail->harga = $request->harga;
                $newOrderDetail->order_id = $orderSementara->id;
                $newOrderDetail->jumlah_barang = $request->jumlah_barang;
                $newOrderDetail->jumlah_harga = $request->jumlah_barang * $request->harga;
                $newOrderDetail->save();
            } else {
                $orderDetailLama->jumlah_barang = $orderDetailLama->jumlah_barang + $request->jumlah_barang;
                $orderDetailLama->jumlah_harga = $orderDetailLama->jumlah_harga + $request->jumlah_barang * $request->harga;
                $orderDetailLama->save();   
            }

        } else {
            $orderSementara->customer_id = $request->customer_id;
            $orderSementara->is_checkout = false;
            $orderSementara->save();

            $orderDetail->produk_id = $request->produk_id;
            $orderDetail->harga = $request->harga;
            $orderDetail->order_id = $orderSementara->id;
            $orderDetail->jumlah_barang = $request->jumlah_barang;
            $orderDetail->jumlah_harga = $request->jumlah_barang * $request->harga;
            $orderDetail->save();
        }

        return redirect()->route('keranjang', [$hasData->id]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
