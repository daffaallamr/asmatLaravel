@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="border-profil"></div>
    <div class="profil">
        <div class="sidenav">
            <div class="sidenav-top">
            <h1>Selamat <br> Datang di Asmat!</h1>
            <div class="exit-mobile">
            <a href="{{ route('logout-customer') }}"> <img src="public/images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
            </div>
            <ul>
                <li><a href="{{ route('profilAlamat') }}">Alamat</a></li>
                <li><a href="{{ route('profilPembelian') }}"><span class="bold">Pembelian</span></a></li>
                <li><a href="{{ route('profilInformasiAkun') }}">Informasi Akun</a></li>
            </ul>
            <div class="exit">
            <a href="{{ route('logout-customer') }}"> <img src="public/images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
        </div>       
        <div class="alamat">
            <div class="top">
                <h2>Riwayat Pembelian</h2>
            </div>
            
            @if ($orders->isEmpty())
                <div class="tabel">
                    <p>Riwayat belanja anda masih kosong</p>
                </div>
            @else

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
                        @foreach ($orders as $order)
                        <tbody>
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
                                @if ($order->status_payment == 'pending')
                                    <td>
                                        <input type="hidden" id="snap_token" value="{{ $order->snap_token }}">
                                        <button class="lacak" id="pay-button">Bayar Sekarang</button>
                                    </td>
                                @elseif ($order->status_payment == 'failed')
                                    <td>
                                        <p>Pembayaran gagal</p>
                                    </td>
                                @elseif ($order->status_payment == 'expired')
                                    <td>
                                        <p>Pembayaran Kadaluarsa</p>
                                    </td>
                                @elseif ($order->status_payment == 'success')
                                    @if ($order->is_dikirim == null)
                                        <td>Dalam Proses</td>
                                    @elseif ($listStatus[$loop->index] == 0)
                                        <td>Dalam Perjalanan</td>
                                    @elseif ($listStatus[$loop->index] == 1)
                                        <td>Sudah Diterima</td>
                                    @elseif ($listStatus[$loop->index] == 3)
                                        <td>Terjadi Kesalahan</td>
                                    @endif
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
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
                            @if ($order->status_payment == 'pending')
                                <p>
                                    <input type="hidden" id="snap_token" value="{{ $order->snap_token }}">
                                    <button class="lacak" id="pay-button">Bayar Sekarang</button>
                                </p>
                            @elseif ($order->status_payment == 'failed')
                                <p>Pembayaran gagal</p>
                            @elseif ($order->status_payment == 'expired')
                                <p>Pembayaran kadaluarsa</p>
                            @elseif ($order->status_payment == 'success')
                                @if ($order->is_dikirim == null)
                                    <p>Dalam Proses</p>
                                @elseif ($listStatus[$loop->index] == 0)
                                    <p>Dalam Perjalanan</p>
                                @elseif ($listStatus[$loop->index] == 1)
                                    <p>Sudah Diterima</p>
                                @elseif ($listStatus[$loop->index] == 3)
                                    <p style="text-align: right">Terjadi<br>Kesalahan</p>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('layouts.footer')
    
    <script src="{{
        !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey')
    }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/midtransSnapPayment.js') }}"></script>

@endsection


