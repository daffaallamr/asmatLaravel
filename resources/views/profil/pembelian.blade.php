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
                <li><a href="{{ route('profil-alamat') }}">Alamat</a></li>
                <li><a href="{{ route('profil-pembelian') }}"><span class="bold">Pembelian</span></a></li>
                <li><a href="{{ route('profil-informasi-akun') }}">Informasi Akun</a></li>
            </ul>
            <div class="exit">
            <a href="{{ route('logout') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
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
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->order_id }}</td>
                                <td>{{ $d->produk }}</td>
                                <td>IDR {{ number_format($d->jumlah_harga, 0, '.', '.') }}</td>
                                <td>Selesai</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>2</td>
                            <td>123077</td>
                            <td>1x Hand Sanitizer Spray</td>
                            <td>IDR 50.000</td>
                            <td><a href="#">Lacak Pesanan</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="riwayat-mobile">
                    <div class="top2">
                        <label for="">123005</label>
                        <label for="">IDR 15.000</label>
                    </div>
                    <div class="bot">
                        <div class="item">
                            <p>1x Hand Sanitizer Spray</p>
                            <p>1x Coklat bar</p>
                        </div>
                        <a href="#">Selesai</a>
                    </div>
                </div>
                <div class="riwayat-mobile">
                    <div class="top2">
                        <label for="">123005</label>
                        <label for="">IDR 10.000</label>
                    </div>
                    <div class="bot">
                        <div class="item">
                            <p>1x Hand Sanitizer Spray</p>
                        </div>
                        <a href="#">Lacak</a>
                    </div>
                </div>
        </div>
    </div>
@include('layouts.footer')
@endsection


