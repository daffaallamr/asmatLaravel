@extends('layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Bagas Aji">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" value="bagasaji">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                </form>
              </div>
            </div>
          </div>

        <!-- Page Heading -->
        <h1 class="h3 mt-5 mb-2 text-gray-800">Ubah Password</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Password Sekarang</label>
                    <input type="password" class="form-control" id="exampleInputName1" value="rahasia">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputEmail3" value="rahasia">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputEmail3" value="rahasia">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">Ubah</button>
                </form>
              </div>
            </div>
          </div>

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

    </div>
    <!-- /.container-fluid -->

@endsection