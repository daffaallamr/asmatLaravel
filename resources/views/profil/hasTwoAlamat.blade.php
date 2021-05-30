<div class="alamat-ganti">
    <div class="card">
        <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
        <label for="">{{ $alamatMain }}</label>  
        <label for="">{{ $isMain->email }}</label> 
        <label for="">{{ $teleponMain }}</label> 
        <label for="">{{ $isMain->provinsi }}</label> 
        <label for="">{{ $isMain->kota }}</label> 
        <label for="">Kecamatan {{ $isMain->kecamatan }}</label> 
        <label for="">{{ $isMain->kode_pos }}</label> 
        <div class="cta-sunting-hapus">
            <div class="sunting">
                <button id="button-sunting-main">Sunting</button>
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
        <button disabled style="cursor: default">Alamat utama</button>
    </div>
</div>

@include('profil.modalSunting-1')

<div class="alamat-ganti">
    <div class="card">
        <h2>{{ $notMain->nama_depan . ' ' . $notMain->nama_belakang}}</h2>
        <label for="">{{ $alamatNotMain }}</label>  
        <label for="">{{ $notMain->email }}</label> 
        <label for="">{{ $teleponNotMain }}</label> 
        <label for="">{{ $notMain->provinsi }}</label> 
        <label for="">{{ $notMain->kota }}</label> 
        <label for="">Kecamatan {{ $notMain->kecamatan }}</label> 
        <label for="">{{ $notMain->kode_pos }}</label>
        <div class="cta-sunting-hapus">
            <div class="sunting">
                <button id="button-sunting-2">Sunting</button>
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

@include('profil.modalSunting-2')