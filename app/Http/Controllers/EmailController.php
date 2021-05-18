<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutConfirmed;
use App\Mail\PembayaranBerhasil;
use App\Mail\SelesaikanPembayaran;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function checkoutConfirmed()
    {
        $customer = Customer::findOrFail(1);
        $orderId = Order::where('customer_id', 1)->where('is_checkout', 0)->first();
        $alamatCustomer = Address::where('customer_id', 1)->where('is_main', 1)->first();
        
        // Mail::to($customer->email)->send(new SelesaikanPembayaran($customer, $orderId, $alamatCustomer));

        $mail = new SelesaikanPembayaran($customer, $orderId, $alamatCustomer);
        return $mail->render();
    }
}
