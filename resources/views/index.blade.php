@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="hero">
    <div class="container">
        <div class="header">
            <h1>Selamat Datang</h1>
            <p>Advancing Sustainable Market (ASMAT) <br> untuk produk masyarakat adat di sekitar hutan PAPUA</p>
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
        <div class="produkbox" onclick="location.href='{{ route('belanja.show', ['belanja' => $product->slug]) }}';">
            <img src="{{ asset('/public/images/' . $product->gambar_1) }}" alt="">
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
            <img src="public/images/sirup a.png" alt="">
        </div>
        <div class="right-col">
            <h1>Apa itu Asmat?</h1>
            <p>ASMAT adalah sebuah Marketplace atau platform perantara yang menghubungkan penjual dan pembeli yang dilakukan secara online (e-Commerce), ASMAT memiliki singkatan Advancing Sustainable Market atau memajukan pasar yang berkelanjutan.  Dibentuk pada tahun 2021 dengan inisiasi yang dilakukan oleh Program Pelestarian Sumber Daya Alam dan Peningkatan Kehidupan Masyarakat Adat melalui Pertanian Berkelanjutan di Tanah Papua atau yang disingkat PAPeDA Papua.  
            </p>
            <p>Sejak 2018 dengan dukungan David and Lucile Packard Foundation, The Asia Foundation bersama Pt PPMA, KIPRa, Perkumpulan Mnuwar Papua, GEMAPALA & PUPUK melakukan pemberdayaan masyarakat adat di Jayapura, Keerom, Manokwari Selatan dan Fakfak.  Berbagai macam potensi komoditas dipilih dan dibudidayakan untuk dapat diolah menjadi produk konsumsi yang layak jual secara berkesinambungan. Website e-Commerce ini digunakan untuk memperkenalkan produk-produk tersebut yang khas akan budaya masyarakat adat dan semangatnya dalam melestarikan hutan Papua.
            </p>
            <div class="cta-video">
                <a href="http://facebook.com">Video Tentang Kami</a>
            </div>
        </div>
    </div>
</div>
<div class="artboard">
    <h1>Cerita Menarik Kami</h1>
    <div class="container">
        @foreach ($stories as $story)
        <div class="card-cerita">
            <div class="img" style="background-image: url({{ asset('public/images/' . $story->gambar_1) }});"></div>
            <p style="text-overflow: ellipsis;">{{ $story->judul }}</p>
            <div class="bot-card">
                <label for="">{{ date('d / m / Y', strtotime($story->created_at)) }}</label>
                <a href="{{ route('cerita.show', ['ceritum' => $story->slug]) }}"class="cta-baca">
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
            <h1>Bagaimana ASMAT membantu</h1>
            <p>ASMAT bukan saja sebagai etalase bagi para produsen yang produknya dipasarkan melalui media ini. ASMAT juga sebagai tempat informasi bagaimana hutan Indonesia dan khsusunya hutan Papua dijaga oleh masyarakat adat dan masyarakat sekitar hutan. Dengan melakukan transaksi pembelian di ASMAT, anda juga terlibat untuk melindungi hutan di Indonesia dan khususnya Papua. 
                </p>
            <p>Maukah Anda menjadi bagian dari penjaga hutan Papua, cukup beli produk mereka di ASMAT. Silahkan untuk menjelajahi platform ini.
                </p>
            <div class="link-sosmed">
                <div class="cta-sosmed">
                    <a href="http://instagram.com">Ikuti Instagram Kami</a>
                </div>
                <div class="cta-sosmed">
                    <a href="http://facebook.com">Ikuti Facebook Kami</a>
                </div>
            </div>
        </div>
        <div class="right-col">
            <img src="public/images/2.png" alt="">
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection