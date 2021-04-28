@extends('layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Produk</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Produk</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Coklat Bar">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Harga Satuan</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="10.000">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Deskripsi Singkat</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet venenatis urna cursus.</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Stok</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="11">
                  </div>
                  <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" name="img[]" class="file-upload-default" style="opacity: 0;">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled value="Upload Gambar">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
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