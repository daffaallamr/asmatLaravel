@extends('layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Pelanggan</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Depan</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Nama Belakang</label>
                    <input type="text" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail3">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail3">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection