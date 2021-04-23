@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="artboard">        
    <h1>Cerita Menarik Kami</h1>
    <div class="container">
        @foreach ($stories as $story)
        <div class="card-cerita">
            <img src="{{ Storage::url($story->gambar_1) }}" alt="">
            <p>{{ $story->judul }}</p>
            <div class="bot-card">
            <label for="">{{ date('d / m / Y', strtotime($story->created_at)) }}</label>
            <a href="{{ URL::to('cerita/' . $story->id) }}"class="cta-baca"> <span class="underline">Baca cerita </span> <img src="images/arrow-white.svg" alt=""></a></div>
        </div>
        @endforeach
    </div>
</div>    
<div class="nav-baca-footer">
    <div class="left">
        <a href="our-story-2.html">&lt;Sebelumnya</a>
    </div>
    <div class="center">
        <a href="our-story.html" class="underline">1</a>
        <a href="our-story-2.html">2</a>
    </div>
    <div class="right">
        <a href="our-story-2.html">Sesudahnya&gt;</a>
    </div>
</div>
@include('layouts.footer')
@endsection
    