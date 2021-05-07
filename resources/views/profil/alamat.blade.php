@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="border-profil"></div>
    <div class="profil">
            <div class="sidenav">
                <div class="sidenav-top">
                <h1>Selamat <br> Datang di Asmat!</h1>
                <div class="exit-mobile">
                <a href="{{ route('logout-customer') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
                </div>
                <ul>
                    <li><a href="{{ route('profilAlamat') }}"><span class="bold">Alamat</span></a></li>
                    <li><a href="{{ route('profilPembelian') }}">Pembelian</a></li>
                    <li><a href="{{ route('profilInformasiAkun') }}">Informasi Akun</a></li>
                </ul>
                <div class="exit">
                <a href="{{ route('logout-customer') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Keluar</span></a> </div>
            </div>
        <div class="alamat">
            <div class="top">
                <h2>Alamat</h2>
                <a id="button">Tambah Alamat</a>
            </div>
            <div class="kartu-alamat">
                @if (!$checkMain)
                    <p>Tambah alamat baru sekarang!</p>
                @elseif (!$checkNotMain)
                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
                            <label for="">{{ $isMain->alamat_lengkap }}</label>  
                            <label for="">{{ $isMain->email }}</label> 
                            <label for="">{{ $isMain->telepon }}</label> 
                            <label for="">{{ $isMain->provinsi }}</label> 
                            <label for="">{{ $isMain->kota }}</label> 
                            <label for="">{{ $isMain->kecamatan }}</label> 
                            <label for="">{{ $isMain->kode_pos }}</label> 
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting-main">Sunting</a>
                                </div>
                                <div class="hapus">
                                    <form action="{{ route('hapusAlamatUtama') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $isMain->id }}">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="cta-alamat-utama">
                            <p>Alamat utama</p>
                        </div>
                    </div>
                @else
                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
                            <label for="">{{ $isMain->alamat_lengkap }}</label>  
                            <label for="">{{ $isMain->email }}</label> 
                            <label for="">{{ $isMain->telepon }}</label> 
                            <label for="">{{ $isMain->provinsi }}</label> 
                            <label for="">{{ $isMain->kota }}</label> 
                            <label for="">{{ $isMain->kecamatan }}</label> 
                            <label for="">{{ $isMain->kode_pos }}</label> 
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting-main">Sunting</a>
                                </div>
                                <div class="hapus">
                                    <form action="{{ route('hapusAlamatUtama') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $isMain->id }}">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="cta-alamat-utama">
                            <a href="">Alamat utama</a>
                        </div>
                    </div>

                    {{-- Modal sunting Data --}}
                    <form action="{{ route('suntingAlamat') }}" method="POST">
                    @csrf
                    <div class="popup">
                        <div class="container">
                            <div class="left-col">
                                <input type="hidden" name="is_main" required value="{{ $isMain->is_main }}">
                                <label for="">Nama depan</label>
                                <input type="text" name="nama_depan" required value="{{ $isMain->nama_depan }}">
                                <label for="">Nama belakang</label>
                                <input type="text" name="nama_belakang" required value="{{ $isMain->nama_belakang }}">
                                <label for="">Telepon</label>
                                <input type="text" name="telepon" required value="{{ $isMain->telepon }}">
                                <label for="">Email</label>
                                <input type="text" name="email" required value="{{ $isMain->email }}"> 
                                <label for="">Alamat lengkap</label>
                                <input type="text" name="alamat_lengkap" required value="{{ $isMain->alamat_lengkap }}">
                            </div>
                            <div class="right-col">
                                <label for="">Provinsi</label>
                                {{-- Mengambil data default --}}
                                <input type="hidden" id="default_sunting_1_provinsi_id" value="{{ $isMain->provinsi_id }}">
                                    <select name="province_id" id="sunting_1_province_id" required>
                                        <option value="">--- Provinsi Tujuan ---</option>
                                        @foreach ($provinsi  as $row)
                                        <option value="{{ $row['province_id'] }}" namaprovinsi="{{ $row['province'] }}">
                                            {{$row['province']}}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{--  Mengambil data nama provinsi  --}}
                                    <input type="hidden" id="sunting_1_nama_provinsi" name="nama_provinsi">
                                <label for="">Kota</label>
                                {{-- Mengambil data default --}}
                                <input type="hidden" id="default_sunting_1_kota_id" value="{{ $isMain->kota_id }}">
                                    <select name="kota_id" id="sunting_1_kota_id" required>
                                        <option value="">--- Kota Tujuan ---</option>
                                    </select>
                                    {{--  Mengambil data nama kota  --}}
                                    <input type="hidden" id="sunting_1_nama_kota" name="nama_kota">
                                <label for="">Kecamatan</label>
                                {{-- Mengambil data default --}}
                                <input type="hidden" id="default_sunting_1_kecamatan_id" value="{{ $isMain->kecamatan_id }}">
                                    <select name="kecamatan_id" id="sunting_1_kecamatan_id" required>
                                        <option value="">--- Kecamatan Tujuan ---</option>
                                    </select>
                                    {{--  Mengambil data nama kecamatan  --}}
                                    <input type="hidden" id="sunting_1_nama_kecamatan" name="nama_kecamatan" required>
                                <label for="">Kode pos</label>
                                <input type="text" name="kode_pos" required>
                                @if ($errors->any())
                                    <h3>{{ $errors->first() }}</h3>
                                @endif 
                                <div class="nav-bot">
                                <div class="exit">
                                    <a id="exitTambahAlamat" style="cursor: pointer">
                                        <img src="images/arrow.svg" alt="" class="exit-arrow">
                                        <span class="underline">Batal</span>
                                    </a>
                                </div>
                                <button class="cta-submit" type="submit">Sunting</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="alamat-ganti">
                        <div class="card">
                            <h2>{{ $notMain->nama_depan . ' ' . $notMain->nama_belakang}}</h2>
                            <label for="">{{ $notMain->alamat_lengkap }}</label>  
                            <label for="">{{ $notMain->email }}</label> 
                            <label for="">{{ $notMain->telepon }}</label> 
                            <label for="">{{ $notMain->provinsi }}</label> 
                            <label for="">{{ $notMain->kota }}</label> 
                            <label for="">{{ $notMain->kecamatan }}</label> 
                            <label for="">{{ $notMain->kode_pos }}</label>
                            <div class="cta-sunting-hapus">
                                <div class="sunting">
                                    <a id="button-sunting-2">Sunting</a>
                                </div>
                                <div class="hapus">
                                    <form action="{{ route('hapusAlamatCadangan') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $notMain->id }}">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('jadikanAlamatUtama') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="cta-jadikan-utama">
                                <input type="hidden" name="id_utama" value="{{ $isMain->id }}">
                                <input type="hidden" name="id_cadangan" value="{{ $notMain->id }}">
                                <button type="submit">Jadikan alamat utama</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    
    {{-- Modal Tambah data--}}
    <form action="{{ route('storeAlamat') }}" method="POST">
        @csrf
        <div class="popup" id="modalTambahAlamat">
            <div class="container">
                <div class="left-col">
                    <label for="">Nama depan</label>
                    <input type="text" name="nama_depan" required>
                    <label for="">Nama belakang</label>
                    <input type="text" name="nama_belakang" required>
                    <label for="">Telepon</label>
                    <input type="text" name="telepon" required>
                    <label for="">Email</label>
                    <input type="text" name="email" required> 
                    <label for="">Alamat lengkap</label>
                    <input type="text" name="alamat_lengkap" required>
                </div>
                <div class="right-col">
                    <label for="">Provinsi</label>
                        <select name="province_id" id="province_id" required>
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
                        <select name="kota_id" id="kota_id" required>
                            <option value="">--- Kota Tujuan ---</option>
                        </select>
                        {{--  Mengambil data nama kota  --}}
                        <input type="hidden" id="nama_kota" name="nama_kota">
                    <label for="">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id" required>
                            <option value="">--- Kecamatan Tujuan ---</option>
                        </select>
                        {{--  Mengambil data nama kecamatan  --}}
                        <input type="hidden" id="nama_kecamatan" name="nama_kecamatan" required>
                    <label for="">Kode pos</label>
                    <input type="text" name="kode_pos" required>
                    @if ($errors->any())
                        <h3>{{ $errors->first() }}</h3>
                    @endif 
                    <div class="nav-bot">
                    <div class="exit">
                        <a id="exitTambahAlamat" style="cursor: pointer">
                            <img src="images/arrow.svg" alt="" class="exit-arrow">
                            <span class="underline">Batal</span>
                        </a>
                    </div>
                    <button class="cta-submit" type="submit">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="popup-bg"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ URL::asset('js/profil.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/rajaOngkir.js') }}"></script>
    {{--  <script type="text/javascript" src="{{ URL::asset('js/formAlamatValidation.js') }}"></script>  --}}
    
    <script>
        $(function() {
            var temp = $("#default_sunting_1_provinsi_id").val(); 
            $("#sunting_1_province_id").val(temp);
        });

        // $(function() {
        //     var temp = $("#default_kota_id").val(); 
        //     $("#kota_id").val(temp);
        // });

        // $(function() {
        //     var temp = $("#default_kecamatan_id").val(); 
        //     $("#kecamatan_id").val(temp);
        // });
    </script>

@include('layouts.footer')
@endsection


