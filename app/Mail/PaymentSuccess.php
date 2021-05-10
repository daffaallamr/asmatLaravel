<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    // public $orderId;

    // /**
    //  * Create a new message instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($orderId)
    // {
    //     $this->orderId = $orderId;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tokoasmatpapua@gmail.com')
                    ->subject('Pembayaran anda sudah diterima')
                    ->view('emails.paymentSuccess');
    }
}
