@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Produk</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="{{ URL::to('adminProduct/' . $product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $product->harga }}">
                  </div>
                  <div class="form-group">
                    <label for="berat">Berat Satuan</label>
                    <input type="text" class="form-control" id="berat" name="berat" value="{{ $product->berat }}">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi">{{ $product->deskripsi }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="{{ $product->stok }}">
                  </div>
                  <div class="form-group">
                    <label>Gambar Produk</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection