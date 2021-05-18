    {{-- Modal Tambah data--}}
    <form action="{{ route('storeAlamat') }}" method="POST">
        @csrf
        <div class="popup" id="modalTambahAlamat">
            <div class="container">
                <div class="left-col">
                    <label for="">Nama depan</label>
                    <input type="text" name="nama_depan">
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
                            <option value="{{ $row->id }}">
                                {{$row->nama_province}}
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
                    <input type="text" id="kode_pos" name="kode_pos">
                    <div class="nav-bot">
                    <div class="exit">
                        <a id="exitTambahAlamat" style="cursor: pointer">
                            <img src="public/images/arrow.svg" alt="" class="exit-arrow">
                            <span class="underline">Batal</span>
                        </a>
                    </div>
                    <button class="cta-submit" type="submit">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>