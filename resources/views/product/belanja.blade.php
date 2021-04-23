@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="showcase" style="margin-top: 150px;">
    <h1>Semua Produk Kami</h1>
    <div class="container">
        @foreach ($products as $product)
        <div class="produkbox-2" onclick="location.href='{{ URL::to('belanja/' . $product->id) }}'">
            <img src="{{ Storage::url($product->gambar) }}" alt="">
            <h2>{{ $product->nama }}</h2>
            <p>IDR {{ number_format($product->harga, 0, '.', '.') }}</p>
        </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
@endsection
    