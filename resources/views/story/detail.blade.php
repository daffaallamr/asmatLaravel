@extends('layouts.main')

@section('content')
@include('layouts.navbar')
    <div class="hero-origin">
        <div class="container" style="background-image: url({{ url('public/images/stories/' . $story->gambar_1) }});">
            <div class="content">
                <span class="spacing" style="opacity: 0; display: none;">spacing</span>
                <h1>{{ $story->judul }}</h1>
                <label for="">{{ date('d / m / Y', strtotime($story->created_at)) }}</label>
            </div>
        </div>
    </div> 
    <div class="paragraf-origin-a">
        <h1>{{ $story->judul_paragraf_1 }}</h1>
        <div class="paragraf-video">
            <iframe width="560" height="315" src="{{ $story->link_video }}" title="{{ $story->judul }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p>@nl2br($story->paragraf_1)</p>
        </div>
    </div>
    @if ($story->gambar_3 == null)
        <div class="paragraf-origin-a">
            <h1>{{ $story->judul_paragraf_2 }}</h1>
            <p>@nl2br($story->paragraf_2)</p>
        </div>  
        <div class="paragraf-origin-a" style="padding-bottom: 50px">
            <h1>{{ $story->judul_paragraf_3 }}</h1>
            <p>@nl2br($story->paragraf_3)</p>
        </div>  
    @else
        <div class="paragraf-origin-b">
            <div class="right-col">
                <img src="{{ asset('public/images/stories/' . $story->gambar_3) }}" alt="">
                <h1>{{ $story->judul_paragraf_2 }}</h1>
                <p>@nl2br($story->paragraf_2)</p>
            </div>
        </div>
        <div class="paragraf-origin-a" style="padding-bottom: 50px">
            <h1>{{ $story->judul_paragraf_3 }}</h1>
            <p>@nl2br($story->paragraf_3)</p>
        </div>
    @endif

@include('layouts.footer')
@endsection
    