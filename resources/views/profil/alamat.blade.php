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
                    <li><a href="{{ route('profil-alamat') }}"><span class="bold">Alamat</span></a></li>
                    <li><a href="{{ route('profil-pembelian') }}">Pembelian</a></li>
                    <li><a href="{{ route('profil-informasi-akun') }}">Informasi Akun</a></li>
                </ul>
                <div class="exit">
                <a href="{{ route('logout') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
            </div>
        <div class="alamat">
            <div class="top">
                <h2>Alamat</h2>
                <a id="button">Tambah Alamat</a>
            </div>
            <div class="kartu-alamat">
                @if (!$checkMain)
                    <p>Tambah alamat baru sekarang!</p>
                @elseif (!$checkNotMain)
                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
                            <label for="">{{ $isMain->alamat_lengkap }}</label>  
                            <label for="">{{ $isMain->email }}</label> 
                            <label for="">{{ $isMain->telepon }}</label> 
                            <label for="">{{ $isMain->provinsi }}</label> 
                            <label for="">{{ $isMain->kota }}</label> 
                            <label for="">{{ $isMain->kecamatan }}</label> 
                            <label for="">{{ $isMain->kode_pos }}</label> 
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting">Sunting</a>
                                </div>
                                <div class="hapus">
                                <a href="Hapus">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="cta-alamat-utama">
                            <p>Alamat utama</p>
                        </div>
                    </div>
                @else
                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
                            <label for="">{{ $isMain->alamat_lengkap }}</label>  
                            <label for="">{{ $isMain->email }}</label> 
                            <label for="">{{ $isMain->telepon }}</label> 
                            <label for="">{{ $isMain->provinsi }}</label> 
                            <label for="">{{ $isMain->kota }}</label> 
                            <label for="">{{ $isMain->kecamatan }}</label> 
                            <label for="">{{ $isMain->kode_pos }}</label> 
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting">Sunting</a>
                                </div>
                                <div class="hapus">
                                <a href="Hapus">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="cta-alamat-utama">
                            <a href="">Alamat utama</a>
                        </div>
                    </div>
                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $notMain->nama_depan . ' ' . $notMain->nama_belakang}}</h2>
                            <label for="">{{ $notMain->alamat_lengkap }}</label>  
                            <label for="">{{ $notMain->email }}</label> 
                            <label for="">{{ $notMain->telepon }}</label> 
                            <label for="">{{ $notMain->provinsi }}</label> 
                            <label for="">{{ $notMain->kota }}</label> 
                            <label for="">{{ $notMain->kecamatan }}</label> 
                            <label for="">{{ $notMain->kode_pos }}</label>
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting-2">Sunting</a>
                                </div>
                                <div class="hapus">
                                    <a href="Hapus">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="cta-jadikan-utama">
                            <a href="">Jadikan alamat utama</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
        <div class="popup">
            <div class="container">
                <div class="left-col">
                    <label for="">Nama depan</label>
                    <input type="text">
                    <label for="">Nama belakang</label>
                    <input type="text">
                    <label for="">Telepon</label>
                    <input type="text">
                    <label for="">Email</label>
                    <input type="text"> 
                    <label for="">Alamat lengkap</label>
                    <input type="text">
                </div>
                <div class="right-col">
                    <label for="">Provinsi</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kota</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kecamatan</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kode pos</label>
                    <input type="text"> 
                    <h3>Email tidak boleh kosong</h3>
                    <div class="nav-bot">
                    <div class="exit">
                    <a href="profil.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Batal</span></a> </div>
                    <a class="cta-submit" href="pengiriman.html">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup">
            <div class="container">
                <div class="left-col">
                    <label for="">Nama depan</label>
                    <input type="text">
                    <label for="">Nama belakang</label>
                    <input type="text">
                    <label for="">Telepon</label>
                    <input type="text">
                    <label for="">Email</label>
                    <input type="text"> 
                    <label for="">Alamat lengkap</label>
                    <input type="text">
                </div>
                <div class="right-col">
                    <label for="">Provinsi</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kota</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kecamatan</label>
                    <select name="" id="">
                    </select>
                    <label for="">Kode pos</label>
                    <input type="text"> 
                    <h3>Email tidak boleh kosong</h3>
                    <div class="nav-bot">
                    <div class="exit">
                    <a href="profil.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Batal</span></a> </div>
                    <a class="cta-submit" href="pengiriman.html">Sunting</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="popup-bg">
    </div>
@include('layouts.footer')
@endsection


