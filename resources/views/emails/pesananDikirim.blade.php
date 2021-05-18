@component('mail::message')
# Pesanan Telah Dikirim


Pesanan anda dengan nomer
<strong>{{ $nomerPesanan }}</strong> telah kami kirim.

Nomer resi anda: <strong>{{ $nomerResi }}</strong>

<br>

Kunjungi website kami untuk kembali melakukan
transaksi guna membantu terlindungnya hutan Papua.

@component('mail::button', ['url' => 'https://asmatpapua.com/'])
Kunjungi Asmat
@endcomponent

<br>

Terima kasih telah
berbelanja bersama kami.
@endcomponent

