@extends('admin.layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Pembayaran Pending</h1>
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
                                <th>Nomer Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Jumlah Pembayaran</th>
                                <th style="min-width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nomer Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->order_unique_id }}</td>
                                <td>{{ $order->customer->nama_depan . ' ' .  $order->customer->nama_belakang }}</td>
                                <td>{{ date('d / m / Y', strtotime($order->created_at)) }}</td>
                                <td>IDR {{ number_format($order->jumlah_pembayaran_akhir, 0, '.', '.') }}</td>
                                <td>
                                    <span>
                                        <a class="btn btn-success btn-circle" data-toggle="modal" data-target="#modalDetail{{ $order->id }}">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a class="btn btn-danger btn-circle" data-toggle="modal" data-target="#modalHapus{{ $order->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modalHapus{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $order->id }}">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form action="{{ route('adminPaymentSuccess.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End modal --}}

                            {{-- Modal Detail/Kirim email dengan resi --}}
                            <div class="modal fade bd-example-modal-lg" id="modalDetail{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Informasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <h5>Detail Order</h5>
                                        <hr>
                                        <div class="form-group">
                                            <label for="nama_produk">Produk yang diorder</label>
                                            @foreach ($order->orderDetails as $detail)
                                                <input readonly type="text" class="form-control mb-2" id="nama_produk" value="{{ $detail->jumlah_barang }}x {{ $detail->product->nama }}  //  IDR {{ number_format($detail->jumlah_harga, 0, '.', '.') }}">
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="total_pembayaran">Total Pembayaran</label>
                                            <input readonly type="text" class="form-control" id="total_pembayaran" value="IDR {{ number_format($order->jumlah_harga_barang, 0, '.', '.') }}">
                                        </div>
                                        <hr>
                                        <h5>Detail Informasi Customer</h5>
                                        <hr>
                                        @if ($order->customer->addresses[0]->is_main == 1)
                                            <div class="form-group">
                                                <label for="nama_pelanggan">Nama Penerima</label>
                                                <input readonly type="text" class="form-control" id="nama_pelanggan" value="{{ $order->customer->addresses[0]->nama_depan . ' ' .  $order->customer->addresses[0]->nama_belakang }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input readonly type="email" class="form-control" id="email" name="email" value="{{ $order->customer->addresses[0]->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">Telepon</label>
                                                <input readonly type="number" class="form-control" id="telepon" name="telepon" value="{{ $order->customer->addresses[0]->telepon }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                                <textarea readonly class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3">{{ $order->customer->addresses[0]->alamat_lengkap }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="provinsi_id">Provinsi</label>
                                                <input readonly type="text" class="form-control" id="provinsi_id" name="provinsi_id" value="{{ $order->customer->addresses[0]->provinsi }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kota_id">Kota</label>
                                                <input readonly type="text" class="form-control" id="kota_id" name="kota_id" value="{{ $order->customer->addresses[0]->kota }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan</label>
                                                <input readonly type="text" class="form-control" id="kecamatan_id" name="kecamatan_id" value="{{ $order->customer->addresses[0]->kecamatan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_pos">Kode Pos</label>
                                                <input readonly type="number" class="form-control" id="kode_pos" name="kode_pos" value="{{ $order->customer->addresses[0]->kode_pos }}">
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label for="nama_pelanggan">Nama Penerima</label>
                                                <input readonly type="text" class="form-control" id="nama_pelanggan" value="{{ $order->customer->addresses[1]->nama_depan . ' ' .  $order->customer->addresses[1]->nama_belakang }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input readonly type="email" class="form-control" id="email" name="email" value="{{ $order->customer->addresses[1]->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">Telepon</label>
                                                <input readonly type="number" class="form-control" id="telepon" name="telepon" value="{{ $order->customer->addresses[1]->telepon }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                                <textarea readonly class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3">{{ $order->customer->addresses[1]->alamat_lengkap }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="provinsi_id">Provinsi</label>
                                                <input readonly type="text" class="form-control" id="provinsi_id" name="provinsi_id" value="{{ $order->customer->addresses[1]->provinsi }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kota_id">Kota</label>
                                                <input readonly type="text" class="form-control" id="kota_id" name="kota_id" value="{{ $order->customer->addresses[1]->kota }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kecamatan_id">Kecamatan</label>
                                                <input readonly type="text" class="form-control" id="kecamatan_id" name="kecamatan_id" value="{{ $order->customer->addresses[1]->kecamatan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_pos">Kode Pos</label>
                                                <input readonly type="number" class="form-control" id="kode_pos" name="kode_pos" value="{{ $order->customer->addresses[1]->kode_pos }}">
                                            </div>
                                        @endif
                                        <hr>
                                        <h5>Ekspedisi dan Ongkir</h5>
                                        <hr>
                                            <div class="form-group">
                                                <label for="ekspedisi">Ekspedisi</label>
                                                <input readonly type="text" class="form-control" id="ekspedisi" name="ekspedisi" value="{{ $order->ekspedisi }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ongkir">Ongkir</label>
                                                <input readonly type="text" class="form-control" id="ongkir" name="ongkir" value="IDR {{ number_format($order->ongkir, 0, '.', '.') }}">
                                            </div>
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