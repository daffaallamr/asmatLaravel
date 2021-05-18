<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PesananTelahDikirim extends Mailable
{
    use Queueable, SerializesModels;

    public $nomerPesanan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nomerPesanan, $nomerResi)
    {
        $this->nomerPesanan = $nomerPesanan;
        $this->nomerResi = $nomerResi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@asmatpapua.com', 'Asmat Papua')
                ->markdown('emails.pesananDikirim', [
                    'nomerPesanan' =>  $this->nomerPesanan,
                    'nomerResi' =>  $this->nomerResi,
                ]);
    }
}
