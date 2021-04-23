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
                <li><a href="{{ route('profil-pembelian') }}">Pembelian</a></li>
                <li><a href="{{ route('profil-informasi-akun') }}"><span class="bold">Informasi Akun</span></a></li>
            </ul>
            <div class="exit">
            <a href="{{ route('logout') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
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
                                <p>{{ $data->nama_depan }}</p>
                            </div>
                            <div class="nama-belakang">
                                <label for="">Nama belakang:</label>
                                <p>{{ $data->nama_belakang }}</p>                               
                            </div>
                            <div class="email">
                                <label for="">Email:</label>
                                <p>{{ $data->email }}</p>                               
                            </div>
                            <div class="telepon">
                                <label for="">Telepon</label>
                                <p>{{ $data->telepon }}</p>                                  
                            </div>
                        </div>
                        <div class="password">
                            <label for="">Kata sandi sekarang:</label>
                            <input type="text">  
                            <label for="">Kata sandi baru:</label>
                            <input type="text"> 
                            <label for="">Konfirmasi kata sandi:</label>
                            <input type="text"> 

                            <h4>Kata sandi lama salah!</h4>
                            <input type="submit" class="cta-submit" id="ubah" value="Ubah">
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="popup-ubah">
        <h2>Apakah anda yakin &quest;</h2>
        <div class="nav-bot">
            <div class="exit">
            <a href="akun.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
            <a class="cta-submit" href="pengiriman.html" style="padding: 10px 31px;">Ya</a>
        </div>
    </div>
    <div class="popup-bg">
    </div>
<script>
    document.getElementById('ubah').addEventListener('click',function() {
    document.querySelector('.popup-ubah').style.display = 'block';
    document.querySelector('.popup-ubah').style.opacity = '1';
    document.querySelector('.popup-bg').style.display = 'block';
    document.querySelector('.popup-bg').style.opacity = '0.2'; 
    });
</script>
@include('layouts.footer')
@endsection


