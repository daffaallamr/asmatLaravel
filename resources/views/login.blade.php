@extends('layouts.main')
@section('content')
<div class="logreg">
    <div class="login-left">
        <div class="container">
            <img src="public/images/log-reg.png" alt="">
        </div>
    </div>
    <div class="login-right">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home-customer') }}">
                    <img src="public/images/logo-footer.png" alt="">
                </a>
                <h2>Selamat datang di Asmat&excl;</h2>
            </div>
            <form class="container-login" action="{{ route('login-customer') }}" method="post">
                @csrf
                <label for="" >Email</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                <label for="">Kata Sandi</label>
                    <input type="password" name="password"> 
                <p class="error">
                    @if ($errors->any())
                        {{ $errors->first() }}
                    @endif
                </p>
                <div class="container-submit">
                    <button href="" class="cta-submit">Masuk</button>
                </div>
                <p class="nav-bottom">Belum punya akun? <a href="{{ route('register-customer') }}"><strong> <span class="underline">Daftar sekarang</span> </strong></a> atau <a href="{{ route('home-customer') }}"><strong> <span class="underline">Kembali ke beranda</span></strong></a></p>
            </form>

        </div>
    </div>
</div>
@endsection
    