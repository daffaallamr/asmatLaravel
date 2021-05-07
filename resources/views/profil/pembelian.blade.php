@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="border-profil"></div>
    <div class="profil">
        <div class="sidenav">
            <div class="sidenav-top">
            <h1>Selamat <br> Datang di Asmat!</h1>
            <div class="exit-mobile">
            <a href="index.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
            </div>
            <ul>
                <li><a href="{{ route('profilAlamat') }}">Alamat</a></li>
                <li><a href="{{ route('profilPembelian') }}"><span class="bold">Pembelian</span></a></li>
                <li><a href="{{ route('profilInformasiAkun') }}">Informasi Akun</a></li>
            </ul>
            <div class="exit">
            <a href="{{ route('login-customer') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
        </div>       
        <div class="alamat">
            <div class="top">
                <h2>Riwayat Pembelian</h2>
            </div>
                <div class="tabel">
                    <table>
                        <thead>
                        <tr>
                            <td>No</td>
                            <td>ID Order</td>
                            <td>Pembelian</td>
                            <td>Total</td>
                            <td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->order_unique_id }}</td>
                                <td>
                                @foreach ($order->orderDetails as $detail)
                                    <div>
                                        {{ $detail->jumlah_barang }}x {{ $detail->product->nama }}
                                    </div>                            
                                @endforeach
                                </td>
                                <td>IDR {{ number_format($order->jumlah_pembayaran_akhir, 0, '.', '.') }}</td>
                                <td>
                                    @if ($order->status_payment == 'pending')
                                        <input type="hidden" id="snap_token" value="{{ $order->snap_token }}">
                                        <button id="pay-button">Bayar Sekarang</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach ($orders as $order)
                    <div class="riwayat-mobile">
                        <div class="top2">
                        <label for="">{{ $order->order_unique_id }}</label>
                            <label for="">IDR {{ number_format($order->jumlah_pembayaran_akhir, 0, '.', '.') }}</label>
                        </div>
                        <div class="bot">
                            <div class="item">
                                @foreach ($order->orderDetails as $detail)
                                    <p>{{ $detail->jumlah_barang }}x {{ $detail->product->nama }}</p>
                                @endforeach
                            </div>
                            <a href="#">Selesai</a>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

    <script src="{{
        !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey')
    }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/midtransSnapPayment.js') }}"></script>

@include('layouts.footer')
@endsection


