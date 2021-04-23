<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function alamat() {
        $isMain = Customer::find(Auth::id())->addresses->where('is_main', 1)->first();
        $notMain = Customer::find(Auth::id())->addresses->where('is_main', 0)->first();

        $checkMain = true;
        $checkNotMain = true;

        if (empty($isMain)) {
            $checkMain = false;
            $checkNotMain = false;

            return view ('profil.alamat', [
                'checkMain'     => $checkMain, 
                'checkNotMain'  => $checkNotMain
                ]);

          } elseif (empty($notMain)) {
            $checkNotMain = false;

            return view ('profil.alamat', [
                'checkMain'     => $checkMain, 
                'checkNotMain'  => $checkNotMain,
                'isMain'        => $isMain
                ]);

          } else {
            return view ('profil.alamat', [
                'checkMain'     => $checkMain, 
                'checkNotMain'  => $checkNotMain,
                'isMain'        => $isMain,
                'notMain'       => $notMain
                ]);
          }
    }

    public function pembelian() {
        $dataOrder = Order::where('customer_id', 1)->get();
        $orderDetail = OrderDetail::where('order_id', '=', [1])->get();
        
        return view ('profil.pembelian', [
            'data' => $orderDetail
            ]);
    }

    public function informasiAkun() {
        return view ('profil.informasiAkun', ['data' => Customer::find(1)]);
    }
}
