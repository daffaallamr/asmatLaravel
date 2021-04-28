@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Pelanggan</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Depan</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Ari">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Belakang</label>
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
                    <label for="exampleInputEmail3">Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputEmail3" value="rahasia">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputEmail3" value="rahasia">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection