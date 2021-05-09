<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MidtransController extends Controller
{
    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        DB::transaction(function() use($notif) {

            $customer = new Customer();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            $order = Order::where('order_unique_id', $orderId)->first();

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
    
                  if($fraud == 'challenge') {
                    $order->setStatusPending();
                  } else {
                    $order->setStatusSuccess();
                  }
    
                }
            } elseif ($transaction == 'settlement') {

                $order->setStatusSuccess();
                $customer->emailPayment();

            } elseif($transaction == 'pending'){

                $order->setStatusPending();

            } elseif ($transaction == 'deny') {

                $order->setStatusFailed();

            } elseif ($transaction == 'expire') {

                $order->setStatusExpired();

            } elseif ($transaction == 'cancel') {

                $order->setStatusFailed();

            }

        });

        return;
    }

    public function tryEmail()
    {
        $customer = new Customer();
        $customer->emailPayment();

        dd('email sent to');
    }
}
