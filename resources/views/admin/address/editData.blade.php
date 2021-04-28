@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Alamat Pelanggan</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample" action="{{ route('adminProduct.update') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Ari Kurniawan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Depan Penerima</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Ari">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Belakang Penerima</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Kurniawan Rosidiq">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="alamatbenar@gmail.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="086555111222">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Alamat Lengkap</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Provinsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="Jawa Timur">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Kota</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="Kota Surabaya">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Kecamatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="Jambangan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Kode Pos</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="64122">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection