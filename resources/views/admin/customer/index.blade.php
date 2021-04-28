@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Pelanggan</h1>
        <div>
            <a class="btn btn-primary btn-icon-split" href="{{ route('adminCustomer.create') }}">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Pelanggan</span>
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
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th style="max-width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Ari</td>
                                <td>Kurniawan Rosidiq</td>
                                <td>arikurniawan@gmail.com</td>
                                <td>081999000888</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminCustomer/' . 1) }}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td>3.</td>
                                <td>Daffa</td>
                                <td>Allam Renanda</td></td>
                                <td>alamatpalsu@gmail.com</td>
                                <td>081999000888</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="tambah_produk.html">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" href="tambah_produk.html">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Nana</td>
                                <td>Salahantun</td>
                                <td>alamatbenar@gmail.com</td>
                                <td>081999000888</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="#">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" href="tambah_produk.html">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection