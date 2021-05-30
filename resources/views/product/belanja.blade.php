@extends('layouts.main')

@section('content')
@include('layouts.navbar')
    <div class="showcase" style="margin-top: 150px;">
        <h1>Semua Produk Kami</h1>
        <div class="container">
            @foreach ($products as $product)
            <div class="produkbox-2" onclick="location.href='{{ route('belanja.show', ['belanja' => $product->slug]) }}'">
                <img src="{{ asset('public/images/' . $product->gambar) }}" alt="">
                <div class="content-produkbox">
                    <h2>{{ $product->nama }}</h2>
                    <p>IDR {{ number_format($product->harga, 0, '.', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@include('layouts.footer')
@endsection
    