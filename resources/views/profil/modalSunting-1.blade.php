{{-- Modal sunting Data Main --}}
<form action="{{ route('suntingAlamat') }}" method="POST">
    @csrf
    <div class="popup" id="modalSuntingAlamat-1">
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
                    <input type="text" name="kode_pos" required value="{{ $isMain->kode_pos }}">
                <div class="nav-bot">
                    <div class="exit">
                        <a id="exitSuntingAlamat-1" style="cursor: pointer">
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