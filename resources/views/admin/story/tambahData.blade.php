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
                <form class="forms-sample" action="{{ route('adminStory.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                  <div class="form-group">
                    <label for="judul">Judul Cerita</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_1">Judul Paragraf - 1</label>
                    <input type="text" class="form-control" id="judul_paragraf_1" name="judul_paragraf_1">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_1">Paragraf - 1</label>
                    <textarea class="form-control" id="paragraf_1" rows="5" name="paragraf_1"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_2">Judul Paragraf - 2</label>
                    <input type="text" class="form-control" id="judul_paragraf_2" name="judul_paragraf_2">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_2">Paragraf - 2</label>
                    <textarea class="form-control" id="paragraf_2" rows="5" name="paragraf_2"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_3">Judul Paragraf - 3</label>
                    <input type="text" class="form-control" id="judul_paragraf_3" name="judul_paragraf_3">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_3">Paragraf - 3</label>
                    <textarea class="form-control" id="paragraf_3" rows="5" name="paragraf_3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 1 (Landscape)</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar_1">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 2 (Potrait dan Tidak wajib)</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar_2">
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