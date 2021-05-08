@extends('layouts.mainCheckout')

@section('content')
    <header>
        <img src="images/logo-2.png" alt="">
        <nav>
            <span>
                <a aria-disabled="true" style="cursor: default">Data diri</a>
            </span>
            <label>-</label>
                <a aria-disabled="true" style="cursor: default">Pengiriman</a> 
            <label>-</label>
                <a aria-disabled="true" style="cursor: default">Pembayaran</a>
        </nav>
    </header>
    <form action="{{ route('storeDataDiri') }}" method="POST">
        @csrf
        <section style="justify-content: space-around;">
            <div class="container">
                <div class="left-col">
                    <label for="">Nama depan</label>
                        <input  type="text" name="nama_depan">
                    <label for="">Nama belakang</label>
                        <input type="text" name="nama_belakang">
                    <label for="">Telepon</label>
                        <input type="text" name="telepon">
                    <label for="">Email</label>
                        <input type="text" name="email"> 
                    <label for="">Alamat lengkap</label>
                        <input type="text" name="alamat_lengkap">
                </div>
                <div class="right-col">
                    <label for="">Provinsi</label>
                        <select name="province_id" id="province_id">
                            <option value="">--- Provinsi Tujuan ---</option>
                            @foreach ($provinsi  as $row)
                            <option value="{{ $row['province_id'] }}" namaprovinsi="{{ $row['province'] }}">
                                {{$row['province']}}
                            </option>
                            @endforeach
                        </select>
                        {{--  Mengambil data nama provinsi  --}}
                        <input type="hidden" id="nama_provinsi" name="nama_provinsi">
                    <label for="">Kota</label>
                        <select name="kota_id" id="kota_id">
                            <option value="">--- Kota Tujuan ---</option>
                        </select>
                        {{--  Mengambil data nama kota  --}}
                        <input type="hidden" id="nama_kota" name="nama_kota">
                    <label for="">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id">
                            <option value="">--- Kecamatan Tujuan ---</option>
                        </select>
                        {{--  Mengambil data nama kecamatan  --}}
                        <input type="hidden" id="nama_kecamatan" name="nama_kecamatan">
                    <label for="">Kode pos</label>
                    <input type="text" name="kode_pos">
                    @if ($errors->any())
                        <p class="error">{{ $errors->first() }}</p> 
                    @endif
                    <div class="nav-bot-2">
                        <div class="exit">
                        <a href="{{ route('keranjang') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
                        <button type="submit" class="cta-submit">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ URL::asset('js/rajaOngkir.js') }}"></script>

@endsection