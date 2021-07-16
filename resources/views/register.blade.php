@extends('layouts.main')
@section('content')
<div class="logreg">
    <div class="login-left">
        <div class="container">
            <img src="public/images/log-reg.png" alt="">
        </div>
    </div>
    <div class="login-right">
        <div class="logo">
            <a href="{{ route('home-customer') }}" style="margin-top: -10px">
                <img src="public/images/logo-footer-orange.png" alt="">
            </a>
            <h2>Mulai <br> mendaftar&excl;</h2>
        </div>   
            <form class="container-reg" action="{{ route('register-customer') }}" method="post">
                @csrf
                <div class="nama-depan">
                    <label for="">Nama depan</label> <br>
                        <input type="text" name="nama_depan" value="{{ old('nama_depan') }}">
                </div>
                <div class="nama-belakang">
                    <label for="">Nama Belakang</label> <br>
                        <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}">
                </div>
                <div class="reg-email">
                    <label for="">Email</label> <br>
                        <input type="text" name="email" value="{{ old('email') }}">
                </div>
                <div class="reg-tanggal-lahir">
                    <label for="">Telepon</label> <br>
                        <input type="text" name="telepon" value="{{ old('telepon') }}">
                </div>
                <div class="kata-sandi">
                    <label for="">Kata sandi</label> <br>
                        <input type="password" name="password">
                </div>
                <div class="konfirmasi-sandi">
                    <label for="">Konfirmasi kata sandi</label> <br>
                        <input type="password" name="password_confirmation">
                </div>
                <p class="error">
                    @if ($errors->any())
                        {{ $errors->first() }}
                    @endif
                </p> 
                <div class="exit" style="margin-bottom: 50px">
                    <a href="{{ route('login-customer') }}">
                        <img src="public/images/arrow.svg" alt="" class="exit-arrow">
                        <span class="underline">Batal</span>
                    </a> 
                    <input type="submit" class="cta-submit" value="Daftar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    