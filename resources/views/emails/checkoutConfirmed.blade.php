<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASMAT Papua</title>
</head>
<body>
    <h2>Pesanan {{ $orderId->order_unique_id }}</h2>

    <h4>Dipesan oleh:</h4>
    <p>{{ $customer->nama_depan }} {{ $customer->nama_belakang }}</p>
    <br>
    
    <h4>Alamat pengiriman:</h4>
    <p>Nama Penerima: {{ $alamatCustomer->nama_depan }} {{ $alamatCustomer->nama_belakang }}</p>
    <p>Alamat lengkap: {{ $alamatCustomer->alamat_lengkap }}</p>
    <p>Provinsi: {{ $alamatCustomer->provinsi }}</p>
    <p>Kota/Kabupaten: {{ $alamatCustomer->provinsi }}</p>
    <p>Kecamatan: {{ $alamatCustomer->kecamatan }}</p>
    <p>Telepon: {{ $alamatCustomer->telepon }}</p>
    <br>
    
    <h4>Daftar pesanan:</h4>
    @foreach ($orderId->orderDetails as $detail)
        <p>{{ $detail->jumlah_barang }}x {{ $detail->product->nama }} - IDR {{ number_format($detail->jumlah_harga, 0, '.', '.') }}</p>
    @endforeach
    <p>Metode pengiriman: {{ $orderId->ekspedisi }} - IDR {{ number_format($orderId->ongkir, 0, '.', '.') }}</p>
    <p>Total pembayaran: {{ $orderId->jumlah_pembayaran_akhir }}</p>

    <p>Segera selesaikan pembayaran anda. Anda bisa melakukan pembayaran di bagian Profil -> Pembelian dan tekan tombol Bayar Sekarang</p>
    <br>

    <p>Terima kasih telah mendukung ASMAT.</p>
</body>
</html>