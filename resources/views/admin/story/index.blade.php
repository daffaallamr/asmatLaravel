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
                                <th style="min-width: 50px;">No.</th>
                                <th style="min-width: 120px;">Penulis</th>
                                <th style="min-width: 150px;">Judul Cerita</th>
                                <th style="min-width: 170px;">Judul Paragraf - 1</th>
                                <th style="min-width: 350px;">Paragraf - 1</th>
                                <th style="min-width: 170px;">Judul Paragraf - 2</th>
                                <th style="min-width: 350px;">Paragraf - 2</th>
                                <th style="min-width: 170px;">Judul Paragraf - 3</th>
                                <th style="min-width: 350px;">Paragraf - 3</th>
                                <th style="min-width: 150px;">Gambar - 1</th>
                                <th style="min-width: 150px;">Gambar - 2</th>
                                <th style="min-width: 150px;">Tanggal Upload</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Penulis</th>
                                <th>Judul Cerita</th>
                                <th>Judul Paragraf - 1</th>
                                <th>Paragraf - 1</th>
                                <th>Judul Paragraf - 2</th>
                                <th>Paragraf - 2</th>
                                <th>Judul Paragraf - 3</th>
                                <th>Paragraf - 3</th>
                                <th>Gambar - 1</th>
                                <th>Gambar - 2</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($stories as $story)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $story->admin->nama }}</td>
                                <td>{{ $story->judul }}</td>
                                <td>{{ $story->judul_paragraf_1 }}</td>
                                <td>{{ $story->paragraf_1 }}</td>
                                <td>{{ $story->judul_paragraf_2 }}</td>
                                <td>{{ $story->paragraf_2 }}</td>
                                <td>{{ $story->judul_paragraf_3 }}</td>
                                <td>{{ $story->paragraf_3 }}</td>
                                <td>
                                    <img src="{{ url('images/' . $story->gambar_1) }}" alt="" style="width: 300px; height: auto;">
                                </td>
                                <td>
                                    <img src="{{ url('images/' . $story->gambar_3) }}" alt="" style="width: 200px; height: auto;">
                                </td>
                                <td>{{ date('d / m / Y', strtotime($story->created_at)) }}</td>
                                <td>
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