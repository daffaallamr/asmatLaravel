{{-- Modal sunting Data Second --}}
<form action="{{ route('suntingAlamat') }}" method="POST">
    @csrf
    <div class="popup" id="modalSuntingAlamat-2">
        <div class="container">
            <div class="left-col">
                <input type="hidden" name="is_main" required value="{{ $notMain->is_main }}">
                <label for="">Nama depan</label>
                <input type="text" name="nama_depan" required value="{{ $notMain->nama_depan }}">
                <label for="">Nama belakang</label>
                <input type="text" name="nama_belakang" required value="{{ $notMain->nama_belakang }}">
                <label for="">Telepon</label>
                <input type="text" name="telepon" required value="{{ $notMain->telepon }}">
                <label for="">Email</label>
                <input type="text" name="email" required value="{{ $notMain->email }}"> 
                <label for="">Alamat lengkap</label>
                <input type="text" name="alamat_lengkap" required value="{{ $notMain->alamat_lengkap }}">
            </div>
            <div class="right-col">
                <label for="">Provinsi</label>
                {{-- Mengambil data default --}}
                <input type="hidden" id="default_sunting_2_provinsi_id" value="{{ $notMain->provinsi_id }}">
                    <select name="province_id" id="sunting_2_province_id" required>
                        <option value="">--- Provinsi Tujuan ---</option>
                        @foreach ($provinsi  as $row)
                        <option value="{{ $row['province_id'] }}" namaprovinsi="{{ $row['province'] }}">
                            {{$row['province']}}
                        </option>
                        @endforeach
                    </select>
                    {{--  Mengambil data nama provinsi  --}}
                    <input type="hidden" id="sunting_2_nama_provinsi" name="nama_provinsi">
                <label for="">Kota</label>
                {{-- Mengambil data default --}}
                <input type="hidden" id="default_sunting_2_kota_id" value="{{ $notMain->kota_id }}">
                    <select name="kota_id" id="sunting_2_kota_id" required>
                        <option value="">--- Kota Tujuan ---</option>
                    </select>
                    {{--  Mengambil data nama kota  --}}
                    <input type="hidden" id="sunting_2_nama_kota" name="nama_kota">
                <label for="">Kecamatan</label>
                {{-- Mengambil data default --}}
                <input type="hidden" id="default_sunting_2_kecamatan_id" value="{{ $notMain->kecamatan_id }}">
                    <select name="kecamatan_id" id="sunting_2_kecamatan_id" required>
                        <option value="">--- Kecamatan Tujuan ---</option>
                    </select>
                    {{--  Mengambil data nama kecamatan  --}}
                    <input type="hidden" id="sunting_2_nama_kecamatan" name="nama_kecamatan" required>
                <label for="">Kode pos</label>
                <input type="text" name="kode_pos" required value="{{ $isMain->kode_pos }}">
                @if ($errors->any())
                    <h3>{{ $errors->first() }}</h3>
                @endif 
                <div class="nav-bot">
                <div class="exit">
                    <a id="exitSuntingAlamat-2" style="cursor: pointer">
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