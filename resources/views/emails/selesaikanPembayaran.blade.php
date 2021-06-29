@component('mail::message')
# Pesanan {{ $orderId->order_unique_id }}
Dipesan oleh <strong>{{ $customer->nama_depan }} {{ $customer->nama_belakang }}</strong>

<br><br>
Nama Penerima: {{ $alamatCustomer->nama_depan }} {{ $alamatCustomer->nama_belakang }}<br>
Provinsi: {{ $alamatCustomer->provinsi }}<br>
Kota/Kabupaten: {{ $alamatCustomer->provinsi }}<br>
Kecamatan: {{ $alamatCustomer->kecamatan }}<br>
Telepon: {{ \Crypt::decryptString($alamatCustomer->telepon) }}<br>
Alamat lengkap: {{ \Crypt::decryptString($alamatCustomer->alamat_lengkap) }}<br>

<br>
@component('mail::table')
| Keterangan       | Harga           |
| ------------- |:-------------:|
@foreach ($orderId->orderDetails as $detail)
| {{ $detail->jumlah_barang }}x {{ $detail->product->nama }}      | IDR {{ number_format($detail->jumlah_harga, 0, '.', '.') }}      |
@endforeach
| <strong>Total pembayaran:</strong>      | <strong>IDR {{ number_format($orderId->jumlah_pembayaran_akhir, 0, '.', '.') }}</strong> |
@endcomponent

<br>
@component('mail::button', ['url' => 'https://asmatpapua.com/profil-pembelian'])
Selesaikan Pembayaran
@endcomponent

Terima kasih telah
berbelanja bersama kami.
@endcomponent
