@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="detail-barang">
    <div class="showcase">
        <img src="{{ asset('public/images/products/' . $product->gambar_1) }}" alt="" class="Slides">
        @if (!$product->gambar_2 == null)
            <img src="{{ asset('public/images/products/' . $product->gambar_2) }}" alt="" class="Slides">
            <div class="slideArrow">
                <button class="w3-button w3-display-left" onclick="plusDivs(-1)"><img src="{{ asset('public/images/arrow-white.svg') }}" alt=""></button>
                <button class="w3-button w3-display-right" onclick="plusDivs(+1)"><img src="{{ asset('public/images/arrow-white.svg') }}" alt=""></button>
            </div>
        @endif
    </div>
    <div class="detail">
        <div class="top">
            <h2>{{ $product->nama }}</h2>
            <h4>IDR {{ number_format($product->harga, 0, '.', '.') }}</h4>
            <p>@nl2br($product->deskripsi)</p>
            <p for="">
                Stok: {{ $product->stok }}
            </p>
        </div>
        <div class="bot">
            <form action="{{ route('storeOrder') }}" method="POST">
            @csrf
                <input type="hidden" name="customer_id" value="{{ Auth('customer')->id() }}">

                <input type="hidden" name="produk_id" value="{{ $product->id }}">
                <input type="hidden" name="harga" value="{{ $product->harga}}">
                <input type="hidden" name="berat" value="{{ $product->berat}}">

                <div class="quantity">
                    <button class="btn minus-btn" type="button" disabled="disabled">-</button>
                        <input type="text" name="jumlah_barang" id="quantity" value="1">
                    <button class="btn plus-btn" type="button">+</button>
                </div>
                <div class="cta-submit">
                    @if ($product->stok == 0)
                        <button id="stokHabis" type="submit" disabled>Stok Habis</button>                    
                    @else
                        <button type="submit">Tambah ke keranjang</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<div class="video">
    <div class="wrapper-video">
        <h1>Video Tentang<br>{{ $product->nama }}</h1>
        <iframe width="560" height="300" src="{{ $product->link_video }}" title="{{ $product->nama }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

    <script type="text/javascript" src="{{ asset('public/js/detailProduct.js') }}"></script>

@include('layouts.footer')
@endsection
    