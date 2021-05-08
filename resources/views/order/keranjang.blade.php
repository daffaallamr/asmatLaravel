@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="keranjang-belanja">
    <div class="head">
        <h3>Keranjang Belanja</h3>
    </div>

        @include('order.tabelKeranjangMobile')

        @include('order.tabelKeranjang')

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ URL::asset('js/keranjang.js') }}"></script>

@include('layouts.footer')
@endsection