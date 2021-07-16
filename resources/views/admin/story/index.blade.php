@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Cerita</h1>
        <div>
            <a class="btn btn-primary btn-icon-split" href="{{ route('adminStory.create') }}">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Cerita</span>
            </a>
        </div>
        <br>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Penulis</th>
                                <th>Judul Cerita</th>
                                <th>Tanggal Upload</th>
                                <th>Gambar - 1 (Utama)</th>
                                <th>Gambar - 2 (Tambahan)</th>
                                <th style="min-width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Penulis</th>
                                <th>Judul Cerita</th>
                                <th>Tanggal Upload</th>
                                <th>Gambar - 1 (Utama)</th>
                                <th>Gambar - 2 (Tambahan)</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($stories as $story)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $story->admin->nama }}</td>
                                <td>{{ $story->judul }}</td>
                                <td>{{ date('d / m / Y', strtotime($story->created_at)) }}</td>
                                <td>
                                    <img src="{{ url('public/images/stories/' . $story->gambar_1) }}" alt="" style="width: 300px; height: auto;">
                                </td>
                                <td>
                                    <img src="{{ url('public/images/stories/' . $story->gambar_3) }}" alt="" style="width: 200px; height: auto;">
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#modalDetail{{ $story->id }}">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminStory/' . $story->id . '/edit') }}"> 
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalHapus{{ $story->id }}" >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>

                            {{-- Modal Detail/Kirim email dengan resi --}}
                            <div class="modal fade bd-example-modal-lg" id="modalDetail{{ $story->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Informasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group">
                                            <label for="judul">Judul Cerita</label>
                                            <input readonly type="text" class="form-control" id="judul" name="judul" value="{{ $story->judul }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="link_video">Video Youtube (Link dengan format Embed)</label>
                                            <input readonly type="text" class="form-control" id="link_video" name="link_video" value="{{ $story->link_video }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="judul_paragraf_1">Judul Paragraf Pertama</label>
                                            <input readonly type="text" class="form-control" id="judul_paragraf_1" name="judul_paragraf_1" value="{{ $story->judul_paragraf_1 }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="paragraf_1">Paragraf Pertama</label>
                                            <textarea readonly class="form-control" id="paragraf_1" rows="8" name="paragraf_1">{{ $story->paragraf_1 }}</textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="judul_paragraf_2">Judul Paragraf Kedua</label>
                                            <input readonly type="text" class="form-control" id="judul_paragraf_2" name="judul_paragraf_2" value="{{ $story->judul_paragraf_2 }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="paragraf_2">Paragraf Kedua</label>
                                            <textarea readonly class="form-control" id="paragraf_2" rows="8" name="paragraf_2">{{ $story->paragraf_2 }}</textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="judul_paragraf_3">Judul Paragraf Ketiga</label>
                                            <input readonly type="text" class="form-control" id="judul_paragraf_3" name="judul_paragraf_3" value="{{ $story->judul_paragraf_3 }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="paragraf_3">Paragraf Ketiga</label>
                                            <textarea readonly class="form-control" id="paragraf_3" rows="8" name="paragraf_3">{{ $story->paragraf_3 }}</textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalHapus{{ $story->id }}" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel{{ $story->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $story->id }}">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="{{ route('adminStory.destroy', $story->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection