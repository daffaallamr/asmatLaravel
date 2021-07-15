@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Produk</h1>
        <div>
            <a class="btn btn-primary btn-icon-split" href="{{ route('adminProduct.create') }}">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Produk</span>
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
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th style="min-width: 250px;">Deskripsi produk</th>
                                <th>Stok</th>
                                <th>Gambar - 1</th>
                                <th>Gambar - 2</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Deskripsi produk</th>
                                <th>Stok</th>
                                <th>Gambar - 1</th>
                                <th>Gambar - 2</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>IDR {{ number_format($product->harga, 0, '.', '.') }}</td>
                                <td>{{ $product->berat }} gram</td>
                                <td>@nl2br($product->deskripsi)</td>
                                <td>{{ $product->stok }}</td>
                                <td>
                                    <img src="{{ url('public/images/' . $product->gambar_1) }}" alt="" style="width: auto; height: 200px;">
                                </td>
                                <td>
                                    <img src="{{ url('public/images/' . $product->gambar_2) }}" alt="" style="width: auto; height: 200px;">
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminProduct/' . $product->id . '/edit') }}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalHapus{{ $product->id }}" >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modalHapus{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $product->id }}">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="{{ route('adminProduct.destroy', $product->id) }}" method="POST">
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