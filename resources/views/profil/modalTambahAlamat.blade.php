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