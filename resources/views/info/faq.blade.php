@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="faq">
    <div class="container">
        <h2>Pertanyaan & Jawaban</h2>
        <div class="accordion">
            <div class="contentBx">
                <label for="">Apa itu Asmat</label>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla lacus eget, accumsan ligula. Class aptent taciti sociosqu ad litora torquent. Lorem </p>
                </div>
            </div>
            <div class="contentBx">
                <label for="">Kenapa harus Asmat</label>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla lacus eget, accumsan ligula. Class aptent taciti sociosqu ad litora torquent. Lorem </p>
                </div>
            </div>
            <div class="contentBx">
                <label for="">Produk Asmat</label>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta magna vel varius auctor. Vivamus non quam euismod, fringilla lacus eget, accumsan ligula. Class aptent taciti sociosqu ad litora torquent. Lorem </p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
    const accordion = document.getElementsByClassName
    ('contentBx');
    for (i = 0; i<accordion.length; i++){
        accordion[i].addEventListener('click', function(){
            this.classList.toggle('active')
        })
    }
</script>
@endsection
    