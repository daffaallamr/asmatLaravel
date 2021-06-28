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
                <form class="forms-sample" action="{{ URL::to('adminCustomer/' . $customer->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                  @endif
                  <div class="form-group">
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $customer->nama_depan }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $customer->nama_belakang }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="{{ \Crypt::decryptString($customer->telepon) }}">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="password_confirmation">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection