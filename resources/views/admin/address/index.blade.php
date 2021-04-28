@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Alamat Pelanggan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="min-width: 140px;">Nama Pelanggan</th>
                                <th style="min-width: 140px;">Nama Depan Penerima</th>
                                <th style="min-width: 140px;">Nama Belakang Penerima</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th style="min-width: 150px;">Alamat Lengkap</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Status</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Depan Penerima</th>
                                <th>Nama Belakang Penerima</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat Lengkap</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Ari Kurniawan</td>
                                <td>Nanda</td>
                                <td>Safira</td>
                                <td>arikurniawan@gmail.com</td>
                                <td>081999000888</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jawa Timur</td>
                                <td>Kota Surabaya</td>
                                <td>Jambangan</td>
                                <td>64122</td>
                                <td>Utama</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminAddress/' . 1) }}">
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
                                <td>2.</td>
                                <td>Ari Kurniawan</td>
                                <td>Ari</td>
                                <td>Kurniawan</td>
                                <td>arikurniawan@gmail.com</td>
                                <td>081999000888</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jawa Timur</td>
                                <td>Kota Surabaya</td>
                                <td>Jambangan</td>
                                <td>64122</td>
                                <td>Cadangan</td>
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
                                <td>Daffa Allam Renanda</td>
                                <td>Daffa</td>
                                <td>Allam Renanda</td>
                                <td>alamatbenar@gmail.com</td>
                                <td>081999000888</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jawa Timur</td>
                                <td>Kota Surabaya</td>
                                <td>Jambangan</td>
                                <td>64122</td>
                                <td>Utama</td>
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