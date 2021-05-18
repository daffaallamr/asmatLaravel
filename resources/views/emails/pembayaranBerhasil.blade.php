@component('mail::message')
# Konfirmasi Pembayaran


Pembayaran pesanan anda dengan nomer
<strong>{{ $nomerPesanan }}</strong> telah kami konfirmasi.

<br>

Kunjungi website kami untuk kembali melakukan
transaksi guna membantu terlindungnya hutan Papua.

@component('mail::button', ['url' => 'https://asmatpapua.com/'])
Belanja Sekarang
@endcomponent

<br>

Terima kasih telah
berbelanja bersama kami.
@endcomponent

