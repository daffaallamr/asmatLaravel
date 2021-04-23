@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="section-about">
    <div class="container">
        <div class="left-col">
            <h1>Tentang Kami</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla lacus eget, accumsan ligula. Class aptent taciti sociosqu ad litora torquent. Lorem</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla lacus eget, accumsan ligula. Class aptent taciti sociosqu ad litora torquent. Lorem</p>
        </div>
        <div class="right-col">
            <img src="images/banner-about.svg" alt="">
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection