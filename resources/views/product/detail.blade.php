@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="detail-barang">
    <div class="showcase">
        <img src="{{ asset('public/images/' . $product->gambar) }}" alt="">
    </div>
    <div class="detail">
        <div class="top">
            <h2>{{ $product->nama }}</h2>
            <h4>IDR {{ number_format($product->harga, 0, '.', '.') }}</h4>
            <p>{{ $product->deskripsi }}</p>
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
                    <button type="submit">Tambah ke keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script type="text/javascript" src="{{ asset('public/js/detailProduct.js') }}"></script>

@include('layouts.footer')
@endsection
    