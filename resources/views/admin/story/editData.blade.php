@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Cerita</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="{{ URL::to('adminStory/' . $story->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  @if ($errors->any())
                      <div class="alert alert-danger" role="alert">
                          {{ $errors->first() }}
                      </div>
                  @endif
                  <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                  <div class="form-group">
                    <label for="judul">Judul Cerita</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $story->judul }}">
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_1">Judul Paragraf Pertama</label>
                    <input type="text" class="form-control" id="judul_paragraf_1" name="judul_paragraf_1" value="{{ $story->judul_paragraf_1 }}">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_1">Paragraf Pertama</label>
                    <textarea class="form-control" id="paragraf_1" rows="5" name="paragraf_1">{{ $story->paragraf_1 }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_2">Judul Paragraf Kedua</label>
                    <input type="text" class="form-control" id="judul_paragraf_2" name="judul_paragraf_2" value="{{ $story->judul_paragraf_2 }}">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_2">Paragraf Kedua</label>
                    <textarea class="form-control" id="paragraf_2" rows="5" name="paragraf_2">{{ $story->paragraf_2 }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="judul_paragraf_3">Judul Paragraf Ketiga</label>
                    <input type="text" class="form-control" id="judul_paragraf_3" name="judul_paragraf_3" value="{{ $story->judul_paragraf_3 }}">
                  </div>
                  <div class="form-group">
                    <label for="paragraf_3">Paragraf Ketiga</label>
                    <textarea class="form-control" id="paragraf_3" rows="5" name="paragraf_3">{{ $story->paragraf_3 }}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 1 (Utama)</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar_1" value="{{ $story->gambar_1 }}">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 2 (Tambahan dan Tidak wajib)</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="gambar_2" value="{{ $story->gambar_2 }}">
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