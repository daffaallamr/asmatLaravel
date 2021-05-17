@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Alamat Cadangan Pelanggan</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="min-width: 140px;">Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th style="min-width: 150px;">Alamat Lengkap</th>
                                <th style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <script>
                                var dataJS = @json($addresses).length;
                            </script>
                            @foreach ($addresses as $address)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->customer->nama_depan . ' ' . $address->customer->nama_belakang }}</td>
                                <td>{{ $address->email }}</td>
                                <td>{{ $address->telepon }}</td>
                                <td>{{ $address->alamat_lengkap }}</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#modalDetail{{ $address->id }}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalHapus{{ $address->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>

                            {{-- Modal Sunting/Detail --}}
                            <div class="modal fade bd-example-modal-lg" id="modalDetail{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Alamat/Sunting Alamat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="forms-sample" action="{{ URL::to('adminAddressSecond/' . $address->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                              <label for="nama_pelanggan">Nama Pelanggan</label>
                                              <input readonly type="text" class="form-control" value="{{ $address->customer->nama_depan . ' ' . $address->customer->nama_belakang }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="nama_depan">Nama Depan Penerima</label>
                                              <input type="text" class="form-control" name="nama_depan" value="{{ $address->nama_depan }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="nama_belakang">Nama Belakang Penerima</label>
                                              <input type="text" class="form-control" name="nama_belakang" value="{{ $address->nama_belakang }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="email">Email</label>
                                              <input type="email" class="form-control" name="email" value="{{ $address->email }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="telepon">Telepon</label>
                                              <input type="number" class="form-control" name="telepon" value="{{ $address->telepon }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="alamat_lengkap">Alamat Lengkap</label>
                                              <textarea class="form-control" name="alamat_lengkap" rows="3">{{ $address->alamat_lengkap }}</textarea>
                                            </div>

                                            {{-- Default ID Provinsi dll --}}
                                            <input type="hidden" id="default_id_provinsi{{ $loop->iteration }}" value="{{ $address->provinsi_id }}">
                                            <input type="hidden" id="default_id_kota{{ $loop->iteration }}" value="{{ $address->kota_id }}">
                                            <input type="hidden" id="default_id_kecamatan{{ $loop->iteration }}" value="{{ $address->kecamatan_id }}">


                                            <div class="form-group">
                                                <label for="">Provinsi</label>
                                                <select class="custom-select" name="province_id" id="admin_main_province_id{{ $loop->iteration }}" required>
                                                    <option value="">--- Provinsi Tujuan ---</option>
                                                    @foreach ($provinsi  as $row)
                                                    <option value="{{ $row['province_id'] }}">
                                                        {{$row['province']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{--  Mengambil data nama provinsi  --}}
                                            <input type="hidden" id="admin_main_nama_provinsi{{ $loop->iteration }}" name="nama_provinsi" value="{{ $address->provinsi }}">

                                            <div class="form-group">
                                                <label for="">Kota</label>
                                                <select class="custom-select" name="kota_id" id="admin_main_kota_id{{ $loop->iteration }}" required>
                                                    <option value="">--- Kota Tujuan ---</option>
                                                </select>
                                            </div>

                                            {{--  Mengambil data nama kota  --}}
                                            <input type="hidden" id="admin_main_nama_kota{{ $loop->iteration }}" name="nama_kota">

                                            <div class="form-group">
                                                <label for="">Kecamatan</label>
                                                <select class="custom-select" name="kecamatan_id" id="admin_main_kecamatan_id{{ $loop->iteration }}" required>
                                                    <option value="">--- Kecamatan Tujuan ---</option>
                                                </select>
                                            </div>

                                            {{--  Mengambil data nama kecamatan  --}}
                                            <input type="hidden" id="admin_main_nama_kecamatan{{ $loop->iteration }}" name="nama_kecamatan" required>

                                            <div class="form-group">
                                              <label for="kode_pos">Kode Pos</label>
                                              <input type="number" class="form-control" name="kode_pos" value="{{ $address->kode_pos }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Sunting</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="modalHapus{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel{{ $address->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $address->id }}">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="{{ route('adminAddressSecond.destroy', $address->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection

@section('js')
    <script src="{{ asset('public/js/adminAddressSecond.js') }}"></script>
@endsection