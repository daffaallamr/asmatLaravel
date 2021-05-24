@component('mail::message')
# Konfirmasi Pembayaran


Pembayaran pesanan anda dengan nomor
<strong>{{ $nomerPesanan }}</strong> telah dikonfirmasi.

<br>

Kunjungi laman web kami untuk kembali melakukan
transaksi guna membantu terlindungnya hutan Papua.

@component('mail::button', ['url' => 'https://asmatpapua.com/'])
Belanja Sekarang
@endcomponent

<br>

Terima kasih telah
berbelanja bersama kami.
@endcomponent

