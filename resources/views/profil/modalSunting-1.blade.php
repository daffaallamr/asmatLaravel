{{-- Modal sunting Data Main --}}
<form action="{{ route('suntingAlamat') }}" method="POST">
    @csrf
    <div class="popup" id="modalSuntingAlamat-1">
        <div class="container">
            <div class="left-col">
                <input type="hidden" name="is_main" value="{{ $isMain->is_main }}">
                <input type="hidden" name="addressId" value="{{ $isMain->id }}">
                <label for="">Nama depan</label>
                <input type="text" name="nama_depan" value="{{ $isMain->nama_depan }}">
                <label for="">Nama belakang</label>
                <input type="text" name="nama_belakang" value="{{ $isMain->nama_belakang }}">
                <label for="">Telepon</label>
                <input type="text" name="telepon" value="{{ $isMain->telepon }}">
                <label for="">Email</label>
                <input type="text" name="email" value="{{ $isMain->email }}"> 
                <label for="">Alamat lengkap</label>
                <input type="text" name="alamat_lengkap" value="{{ $isMain->alamat_lengkap }}">
            </div>
            <div class="right-col">
                <label for="">Provinsi</label>
                {{-- Mengambil data default --}}
                <input type="hidden" id="default_sunting_1_provinsi_id" value="{{ $isMain->provinsi_id }}">
                    <select name="province_id" id="sunting_1_province_id">
                        <option value="">--- Provinsi Tujuan ---</option>
                        @foreach ($provinsi  as $row)
                        <option value="{{ $row->id }}">
                            {{$row->nama_province}}
                        </option>
                        @endforeach
                    </select>
                    {{--  Mengambil data nama provinsi  --}}
                    <input type="hidden" id="sunting_1_nama_provinsi" name="nama_provinsi" value="{{ $isMain->provinsi }}">
                    
                <label for="">Kota</label>
                {{-- Mengambil data default --}}
                <input type="hidden" id="default_sunting_1_kota_id" value="{{ $isMain->kota_id }}">
                    <select name="kota_id" id="sunting_1_kota_id">
                        <option value="">--- Kota Tujuan ---</option>
                    </select>
                    {{--  Mengambil data nama kota  --}}
                    <input type="hidden" id="sunting_1_nama_kota" name="nama_kota" value="{{ $isMain->kota }}">

                <label for="">Kecamatan</label>
                {{-- Mengambil data default --}}
                    <input type="hidden" id="default_sunting_1_kecamatan_id" value="{{ $isMain->kecamatan_id }}">
                    <select name="kecamatan_id" id="sunting_1_kecamatan_id">
                        <option value="">--- Kecamatan Tujuan ---</option>
                    </select>
                    {{--  Mengambil data nama kecamatan  --}}
                    <input type="hidden" id="sunting_1_nama_kecamatan" name="nama_kecamatan" value="{{ $isMain->kecamatan }}">

                <label for="">Kode pos</label>
                    <input type="text" id="sunting_1_kode_pos" name="kode_pos" value="{{ $isMain->kode_pos }}">
                <div class="nav-bot">
                    <div class="exit">
                        <a id="exitSuntingAlamat-1" style="cursor: pointer">
                            <img src="public/images/arrow.svg" alt="" class="exit-arrow">
                            <span class="underline">Batal</span>
                        </a>
                    </div>
                    <button class="cta-submit" type="submit">Sunting</button>
                </div>
            </div>
        </div>
    </div>
</form>