@extends('layouts.main')

@section('content')
@include('layouts.navbar')
    <div class="hero-origin">
        <div class="container" style="background-image: url({{ url('public/images/' . $story->gambar_1) }});">
            <div class="content">
                <h1>{{ $story->judul }}</h1>
                <label for="">{{ date('d / m / Y', strtotime($story->created_at)) }}</label>
            </div>
        </div>
    </div> 
    <div class="paragraf-origin-a">
        <h1>{{ $story->judul_paragraf_1 }}</h1>
        <p>{{ $story->paragraf_1 }}</p>
    </div>
    <div class="paragraf-origin-b">
        <div class="left-col">
            <img src="{{ asset('public/images/' . $story->gambar_3) }}" alt="">
        </div>
        <div class="right-col">
            <h1>{{ $story->judul_paragraf_2 }}</h1>
            <p>{{ $story->paragraf_2 }}</p>
        </div>
    </div>
    <div class="paragraf-origin-a">
        <h1>{{ $story->judul_paragraf_3 }}</h1>
        <p>{{ $story->paragraf_3 }}</p>
    </div>

@include('layouts.footer')
@endsection
    