@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="keranjang-belanja">
    <div class="head">
        <h3>Keranjang Belanja</h3>
    </div>

        @include('order.tabelKeranjangMobile')

        @include('order.tabelKeranjang')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{ asset('public/js/keranjang.js') }}"></script>

@include('layouts.footer')
@endsection