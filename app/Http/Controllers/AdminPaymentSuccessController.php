<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminPaymentSuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status_payment', 'success')->where('is_dikirim', false)->get();
        return view('admin.order.paymentSuccess', [
            'orders' => $orders
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
            'nomer_resi'            => 'required|unique:orders,nomer_resi',
        ];
 
        $messages = [
            'nomer_resi.required'   => 'Nomer resi belum diisi',
            'nomer_resi.unique'        => 'Nomer resi sudah terdaftar di database. Check kevalidan nomer resi!',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $admin = Admin::findOrFail($request->admin_id);

        $order = Order::findOrFail($id);
        $order->nomer_resi = $request->nomer_resi;
        $order->is_dikirim = true;
        $order->dikirim_by = $admin->nama;
        $order->tanggal_pengiriman = Carbon::now();
        $order->save();

        // mengurangi stok
        foreach ($order->orderDetails as $detail) {
            $product = Product::findOrFail($detail->product->id);
            $product->stok = $product->stok - $detail->jumlah_barang;
            $product->save();
        }

        Mail::to($request->email_customer)->send(new PaymentSuccess());

        return redirect()->route('adminPaymentSuccess.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('yes');
        $order = Order::findOrFail($id);
        $order->delete();
    }
}
