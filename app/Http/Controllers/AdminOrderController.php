<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function isPending()
    {
        $orders = Order::where('status_payment', 'pending')->get();
        return view('admin.order.isPending', [
            'orders' => $orders
        ]);
    }

    public function delivered()
    {
        $orders = Order::where('is_dikirim', true)->get();
        return view('admin.order.delivered', [
            'orders' => $orders
        ]);
    }
}
