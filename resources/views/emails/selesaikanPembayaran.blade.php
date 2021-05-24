@component('mail::message')
# Pesanan {{ $orderId->order_unique_id }}
Dipesan oleh <strong>{{ $customer->nama_depan }} {{ $customer->nama_belakang }}</strong>

<br><br>
Nama Penerima: <strong>{{ $alamatCustomer->nama_depan }} {{ $alamatCustomer->nama_belakang }}</strong><br>
Alamat lengkap: <strong>{{ $alamatCustomer->alamat_lengkap }}</strong><br>
Provinsi: <strong>{{ $alamatCustomer->provinsi }}</strong><br>
Kota/Kabupaten: <strong>{{ $alamatCustomer->provinsi }}</strong><br>
Kecamatan: <strong>{{ $alamatCustomer->kecamatan }}</strong><br>
Telepon: <strong>{{ $alamatCustomer->telepon }}</strong><br>

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
