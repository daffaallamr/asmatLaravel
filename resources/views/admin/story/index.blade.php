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
                            <tr>
                                <td>1.</td>
                                <td>Admin Satu</td>
                                <td>Apa Itu Asmat?</td>
                                <td>Asmat adalah:</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</td>
                                <td>Kenapa Asmat?</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</td>
                                <td>Lalu?</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</td>
                                <td>
                                    <img src="{{ asset('images/cerita_2.jpg') }}" alt="" style="width: 300px; height: auto;">
                                </td>
                                <td>
                                    <img src="{{ asset('images/cerita_1.jpg') }}" alt="" style="width: 200px; height: auto;">
                                </td>
                                <td>12/10/2021</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminStory/' . 2) }}"> 
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection