@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="border-profil"></div>
    <div class="profil">
            <div class="sidenav">
                <div class="sidenav-top">
                <h1>Selamat <br> Datang di Asmat!</h1>
                <div class="exit-mobile">
                <a href="{{ route('logout-customer') }}"> <img src="public/images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
                </div>
                <ul>
                    <li><a href="{{ route('profilAlamat') }}"><span class="bold">Alamat</span></a></li>
                    <li><a href="{{ route('profilPembelian') }}">Pembelian</a></li>
                    <li><a href="{{ route('profilInformasiAkun') }}">Informasi Akun</a></li>
                </ul>
                <div class="exit">
                <a href="{{ route('logout-customer') }}"> <img src="public/images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
            </div>
        <div class="alamat">
            <div class="top">
                <h2>Alamat</h2>
                @if (empty($notMain))
                    <a id="button">Tambah Alamat</a>
                @endif
            </div>
            <div class="kartu-alamat">
                @if (!$checkMain)
                    <p>Tambah alamat baru sekarang!</p>

                @elseif (!$checkNotMain)
                    
                    @include('profil.hasOneALamat')
                    @include('profil.modalSunting-1')

                @else

                    @include('profil.hasTwoAlamat')
                    
                @endif
            </div>
        </div>
    </div>

    @include('profil.modalTambahAlamat')

    <div class="popup-bg"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Select2 JS -->
    {{--  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>  --}}

    <script type="text/javascript" src="{{ asset('public/js/profil.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/rajaOngkir.js') }}"></script>
    {{--  <script type="text/javascript" src="{{ URL::asset('js/formAlamatValidation.js') }}"></script>  --}}
    
    {{--  <script>
        $(document).ready(function(){

        // Initialize Select2
        $('#sunting_1_kota_id').select2();

        // Set option selected onchange
        $('#sunting_1_province_id"').change(function(){
            var value = $('#default_sunting_1_kota_id').val();
            console.log(value);

            // Set selected 
            $('#sunting_1_kota_id').val(value);
            $('#sunting_1_kota_id').select2().trigger('change');

        });
        });
    </script>  --}}

@include('layouts.footer')
@endsection


