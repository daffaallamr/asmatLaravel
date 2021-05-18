<div class="alamat-ganti">
    <div class="card">
        <h2>{{ $isMain->nama_depan . ' ' . $isMain->nama_belakang}}</h2>
        <label for="">{{ $isMain->alamat_lengkap }}</label>  
        <label for="">{{ $isMain->email }}</label> 
        <label for="">{{ $isMain->telepon }}</label> 
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
        <p>Alamat utama</p>
    </div>
</div>