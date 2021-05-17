@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="hero">
    <div class="container">
        <div class="header">
            <h1>Kalimat Pembuka Website</h1>
            <p>Sub judul untuk untuk kalimat pembuka <br> yang bisa menjelaskan dengan singkat web ini.</p>
        </div>
        <div class="cta-belanja">
            <a href="{{ route('belanja.index') }}">Belanja Sekarang</a>
        </div>
        <div class="banner">
            <img src="public/images/banner.png" alt="">
        </div>
    </div>
</div>
<div class="showcase">
    <h1>Produk Terbaik Kami</h1>
    <div class="container">
        @foreach ($products as $product)
        <div class="produkbox" onclick="location.href='{{ URL::to('belanja/' . $product->id) }}';">
            <img src="{{ asset('/public/images/' . $product->gambar) }}" alt="">
            <div class="content-produkbox">
                <h2>{{ $product->nama }}</h2>
                <p>IDR {{ number_format($product->harga, 0, '.', '.') }}</p>
            </div>            
        </div>
        @endforeach
    </div>
    <div class="cta-lainnya">
            <a href="{{ route('belanja.index') }}" alt="">Lihat produk lainnya<img src="public/images/arrow.svg"></a>
    </div>
</div>
<div class="about">
    <div class="container">    
        <div class="left-col">
            <img src="public/images/ilustrasi.svg" alt="">
        </div>
        <div class="right-col">
            <h1>Apa itu Asmat?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi porta magna vel varius auctor. Vivamus non quam
                euismod, fringilla lacus eget, accumsan ligula. Class aptent
                taciti sociosqu ad litora torquent. Lorem ipsum dolor sit
                amet, consectetur adipiscing elit. Morbi porta
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi porta magna vel varius auctor. Vivamus non quam
                euismod, fringilla lacus eget, accumsan ligula. Class aptent
                taciti sociosqu ad litora torquent. Lorem ipsum dolor sit
                amet, consectetur adipiscing elit. Morbi porta
                
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi porta magna vel varius auctor. Vivamus non quam
                euismod, fringilla lacus eget, accumsan ligula. Class aptent
                taciti sociosqu ad litora torquent. Lorem ipsum dolor sit
                amet, consectetur adipiscing elit. Morbi porta Lorem
                ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
    </div>
</div>
<div class="artboard">
    <h1>Cerita Menarik Kami</h1>
    <div class="container">
        @foreach ($stories as $story)
        <div class="card-cerita">
            <div class="img" style="background-image: url({{ asset('public/images/' . $story->gambar_1) }});"></div>
            <p>{{ $story->judul }}</p>
            <div class="bot-card">
                <label for="">{{ date('d / m / Y', strtotime($story->created_at)) }}</label>
                <a href="{{ URL::to('cerita/' . $story->id) }}"class="cta-baca">
                    <span class="underline">Baca cerita </span>
                    <img src="public/images/arrow-white.svg" alt="">
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="cta-baca-footer">
    <a href="{{ route('cerita.index') }}"><span class="underline">Baca cerita Lainnya</span> <img src="public/images/arrow.svg" alt=""></a>
    </div>
</div>
<div class="bagaimana">
    <div class="container">
        <div class="left-col">
            <h1>Bagaimana Asmat membantu membangun rumah kita?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi porta magna vel varius auctor. Vivamus non quam
                euismod, fringilla lacus eget, accumsan ligula. Class aptent
                taciti sociosqu ad litora torquent. Lorem ipsum dolor sit
                amet, consectetur adipiscing elit. Morbi porta
                </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi porta magna vel varius auctor. Vivamus non quam
                euismod, fringilla lacus eget, accumsan ligula. Class aptent
                taciti sociosqu ad litora torquent. Lorem ipsum dolor sit
                amet, consectetur adipiscing elit. Morbi porta
                </p>
            <div class="cta-insta">
                <a href="http://instagram.com">Ikuti Instagram Kami</a>
            </div>
        </div>
        <div class="right-col">
            <img src="public/images/2.png" alt="">
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection