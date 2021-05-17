@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Produk</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="{{ route('adminProduct.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                  @endif
                  <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
                  </div>
                  <div class="form-group">
                    <label for="berat">Berat Satuan (gram)</label>
                    <input type="number" class="form-control" id="berat" name="berat" value="{{ old('berat') }}">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi">{{ old('deskripsi') }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="" class="form-control" id="stok" name="stok" value="{{ old('stok') }}">
                  </div>
                  <div class="form-group">
                    <label for="produsen">Produsen</label>
                    <input type="" class="form-control" id="produsen" name="produsen" value="{{ old('produsen') }}">
                  </div>
                  <div class="form-group">
                    <label for="nomer_izin">Nomer izin</label>
                    <input type="" class="form-control" id="nomer_izin" name="nomer_izin" value="{{ old('nomer_izin') }}">
                  </div>
                  <div class="form-group">
                    <label>Gambar Produk</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->
@endsection