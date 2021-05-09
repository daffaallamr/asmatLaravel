<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutConfirmed extends Mailable
{
    use Queueable, SerializesModels;
    
    public $customer;
    public $orderId;
    public $alamatCustomer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $orderId, $alamatCustomer)
    {
        $this->customer = $customer;
        $this->orderId = $orderId;
        $this->alamatCustomer = $alamatCustomer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tokoasmatpapua@gmail.com')
                    ->subject('Selesaikan pembayaran anda di ASMAT Papua')
                    ->view('emails.checkoutConfirmed');
    }
}
