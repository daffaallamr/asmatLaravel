@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Alamat Pelanggan</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="{{ URL::to('adminAddress/' . $address->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input readonly type="text" class="form-control" id="nama_pelanggan" value="{{ $address->customer->nama_depan . ' ' . $address->customer->nama_belakang }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_depan">Nama Depan Penerima</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $address->nama_depan }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_belakang">Nama Belakang Penerima</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $address->nama_belakang }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $address->email }}">
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="{{ $address->telepon }}">
                  </div>
                  <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3">{{ $address->alamat_lengkap }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="provinsi_id">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi_id" name="provinsi_id" value="{{ $address->provinsi_id }}">
                  </div>
                  <div class="form-group">
                    <label for="kota_id">Kota</label>
                    <input type="text" class="form-control" id="kota_id" name="kota_id" value="{{ $address->kota_id }}">
                  </div>
                  <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan_id" name="kecamatan_id" value="{{ $address->kecamatan_id }}">
                  </div>
                  <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" class="form-control" id="kode_pos" name="kode_pos" value="{{ $address->kode_pos }}">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection