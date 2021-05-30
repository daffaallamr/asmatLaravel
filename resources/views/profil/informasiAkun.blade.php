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
                <li><a href="{{ route('profilPembelian') }}">Pembelian</a></li>
                <li><a href="{{ route('profilInformasiAkun') }}"><span class="bold">Informasi Akun</span></a></li>
            </ul>
            <div class="exit">
            <a href="{{ route('logout-customer') }}"> <img src="public/images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
        </div>
        <div class="alamat">
            <div class="top">
                <h2>Informasi Akun</h2>
            </div>
                <div class="informasi-akun">
                    <div class="container">
                        <div class="info">
                            <div class="nama-depan">
                                <label for="">Nama depan:</label>
                                <p>{{ $customer->nama_depan }}</p>
                            </div>
                            <div class="nama-belakang">
                                <label for="">Nama belakang:</label>
                                <p>{{ $customer->nama_belakang }}</p>                               
                            </div>
                            <div class="email">
                                <label for="">Email:</label>
                                <p>{{ $customer->email }}</p>                               
                            </div>
                            <div class="telepon">
                                <label for="">Telepon</label>
                                <p>{{ $customerTelepon }}</p>                                  
                            </div>
                        </div>
                        <div class="password">
                            <form action="{{ route('ubahPassword') }}" method="post">
                            @csrf
                            @method('PUT')
                                <label for="">Kata sandi sekarang:</label>
                                    <input type="password" name="password_sekarang">  
                                <label for="">Kata sandi baru:</label>
                                    <input type="password" name="password"> 
                                <label for="">Konfirmasi kata sandi:</label>
                                    <input type="password" name="password_confirmation"> 
                                @if ($errors->any())
                                    <h4>{{ $errors->first() }}</h4>
                                @endif
                                <button type="submit" class="cta-submit" id="ubah">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="popup-bg">
    </div>

    <script type="text/javascript" src="{{ URL::asset('public/js/profil.js') }}"></script>

@include('layouts.footer')
@endsection


