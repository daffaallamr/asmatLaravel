@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Pesanan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomer Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Nama Penerima</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th style="min-width: 200px;">Alamat Lengkap</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Ekspedisi</th>
                                <th>Nomer Resi</th>
                                <th>Status Pembayaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Tgl Pembayaran</th>
                                <th>Pesanan Diterima</th>
                                <th>Pesanan Dikirim</th>
                                <th style="min-width: 50px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nomer Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Nama Penerima</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat Lengkap</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Ekspedisi</th>
                                <th>Nomer Resi</th>
                                <th>Status Pembayaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Tgl Pembayaran</th>
                                <th>Pesanan Diterima</th>
                                <th>Pesanan Dikirim</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>ASMT-00001</td>
                                <td>Ari Kurniawan</td>
                                <td>20 / 12 / 2020</td>
                                <td>Daffa Allam Renanda</td>
                                <td>alamatbenar@gmail.com</td>
                                <td>085222111333</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jawa Timur</td>
                                <td>Kota Surabaya</td>
                                <td>Jambangan</td>
                                <td>64122</td>
                                <td>JNE Reguler</td>
                                <td>180512140022</td>
                                <td>Dibayar</td>
                                <td>Indomaret</td>
                                <td>IDR 50.000</td>
                                <td>21 / 12 / 2020</td>
                                <td>Diterima</td>
                                <td>Dikirim</td>
                                <td>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>ASMT-00002</td>
                                <td>Bagus</td>
                                <td>20 / 12 / 2020</td>
                                <td>Jihan Ananda</td>
                                <td>alamatbenar@gmail.com</td>
                                <td>085222111333</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jawa Timur</td>
                                <td>Kota Surabaya</td>
                                <td>Jambangan</td>
                                <td>64122</td>
                                <td>JNE Reguler</td>
                                <td>-</td>
                                <td>Belum Dibayar</td>
                                <td>Indomaret</td>
                                <td>IDR 50.000</td>
                                <td>-</td>
                                <td>
                                    <span>
                                        <a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#terimaModal">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-primary btn-circle" data-toggle="modal" data-target="#kirimModal">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>

                            <!-- Modal Menerima Pesanan -->
                            <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <button type="button" class="btn btn-success">Konfirmasi</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Mengirim Pesanan -->
                            <div class="modal fade" id="kirimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kirim Pesanan?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <button type="button" class="btn btn-success">Konfirmasi</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Menerima Pesanan -->
                            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection