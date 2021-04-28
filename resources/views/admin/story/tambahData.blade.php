@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Cerita</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Cerita</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 1</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 1</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 2</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 2</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 3</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 3</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 1 (Landscape)</label>
                    <input type="file" name="img[]" class="file-upload-default" style="opacity: 0;">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 2 (Potrait dan Tidak wajib)</label>
                    <input type="file" name="img[]" class="file-upload-default" style="opacity: 0;">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled">
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