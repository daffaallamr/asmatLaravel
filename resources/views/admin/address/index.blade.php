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
                            @foreach ($addresses as $address)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $address->customer->nama_depan . ' ' . $address->customer->nama_belakang }}</td>
                                <td>{{ $address->nama_depan }}</td>
                                <td>{{ $address->nama_belakang }}</td>
                                <td>{{ $address->email }}</td>
                                <td>{{ $address->telepon }}</td>
                                <td>{{ $address->alamat_lengkap }}</td>
                                <td>{{ $address->provinsi_id }}</td>
                                <td>{{ $address->kota_id }}</td>
                                <td>{{ $address->kecamatan_id }}</td>
                                <td>{{ $address->kode_pos }}</td>
                                <td>@if ($address->is_main)
                                        Utama
                                    @else
                                        Cadangan
                                    @endif
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" href="{{ URL::to('adminAddress/' . $address->id . '/edit') }}">
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
                            <!-- Modal -->
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
                                            <form action="{{ route('adminAddress.destroy', $address->id) }}" method="POST">
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