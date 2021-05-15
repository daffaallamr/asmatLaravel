<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminHomeController extends Controller
{
    public function index() {
        $order = Order::latest();
        
        // pesanan perbulan
        $order->whereMonth('created_at', Carbon::now()->month);
        $pesananPerbulan = $order->count();

        // pesanan pertahun
        $order->whereYear('created_at', Carbon::now()->year);
        $pesananPertahun = $order->count();

        $totalPesanan = Order::all()->count();
        $jumlahCustomer = Customer::all()->count();

        return view('admin.index', [
            'pesananPerbulan' => $pesananPerbulan,
            'pesananPertahun' => $pesananPertahun,
            'totalPesanan' => $totalPesanan,
            'jumlahCustomer' => $jumlahCustomer,
        ]);
    }
}
