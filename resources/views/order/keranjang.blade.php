@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="keranjang-belanja">
    <div class="head">
        <h3>Keranjang Belanja</h3>
    </div>
        @if (empty($order->orderDetails))
            <h1>keranjang kosong!</h1>
        @else
        <div class="body-mobile">
        <form action="{{ route('prosesKeranjangSelanjutnya') }}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
                @php
                    $totalHargaKeranjangMobile = 0;
                @endphp
            @foreach ($order->orderDetails as $detail)
            <div class="tabel-mobile">
            {{-- Default value --}}
            <input type="hidden" name="orderDetail_id_{{ $loop->iteration }}" value="{{ $detail->id }}">
            <input type="hidden" name="harga_{{ $loop->iteration }}" value="0">
            <input type="hidden" name="berat_{{ $loop->iteration }}" value="0">
            <input type="hidden" name="jumlah_barang_{{ $loop->iteration }}" value="0">
                <div class="produk-left">
                    <div class="image-produk">
                        <img src="{{ asset('images/' . $detail->product->gambar) }}" alt="">
                    </div>
                    <div class="info-produk">
                        <label>{{ $detail->product->nama }}</label>
                        <input type="hidden" name="berat_{{ $loop->iteration }}" value="{{ $detail->product->berat }}">
                        <div class="quantity2">
                            <button class="btn sub" type="button">-</button>
                            <input type="text" class="jumlah-barang" name="jumlah_barang_{{ $loop->iteration }}" value="{{ $detail->jumlah_barang }}">
                            <button class="btn add" type="button">+</button>
                        </div>
                    </div>
                </div>
                <div class="produk-right">
                    <input type="hidden" class="detail-harga" name="harga_{{ $loop->iteration }}" value="{{ $detail->harga }}">
                    <label for="">
                        IDR 
                        <input type="text" class="jumlah-harga" name="" value="{{ $detail->harga * $detail->jumlah_barang }}">
                    </label>
                    <a class="hapus-row">Hapus</a>
                </div>
            </div>
            @php
                $totalHargaKeranjangMobile += ($detail->harga * $detail->jumlah_barang);
            @endphp
            @endforeach
            <div class="total">
                <label for="">Total belanja</label>
                <label>
                    IDR 
                    <input type="text" id="total-harga-akhir" name="jumlah_harga_barang" value="{{ $totalHargaKeranjangMobile }}">
                </label>
            </div>
        </div>
        <div class="foot">
            <div class="cta-selanjutnya">
                <button type="submit" formaction="{{ route('simpanKeranjang') }}">Simpan </button>
            </div>
            <div class="cta-selanjutnya">
                <button type="submit">Simpan dan lanjutkan</button>
            </div>
        </div>
    </form>
    @endif

        <div class="body">
            <table class="isi-tabel>
                <tr class="table-top">
                    <td>Produk</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                    <td style="border-right: none;"></td>
                </tr>
                @if (empty($order->orderDetails))
                    <h1>keranjang kosong!</h1>
                @else
                <form action="{{ route('prosesKeranjangSelanjutnya') }}" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                        @php
                            $totalHargaKeranjang = 0;
                        @endphp
                    @foreach ($order->orderDetails as $detail)
                    {{-- Default value --}}
                    <input type="hidden" name="orderDetail_id_{{ $loop->iteration }}" value="{{ $detail->id }}">
                    <input type="hidden" name="harga_{{ $loop->iteration }}" value="0">
                    <input type="hidden" name="berat_{{ $loop->iteration }}" value="0">
                    <input type="hidden" name="jumlah_barang_{{ $loop->iteration }}" value="0">
                    <tr class="table-mid">
                        <td>
                            <div class="produk">
                                <img src="{{ asset('images/' . $detail->product->gambar) }}" alt="">
                                <label for="">{{ $detail->product->nama }}</label>
                                <input type="hidden" name="berat_{{ $loop->iteration }}" value="{{ $detail->product->berat }}">
                            </div>
                        </td>
                        <td>
                            <div class="quantity2">
                                <button class="btn sub" type="button">-</button>
                                <input type="text" class="jumlah-barang" name="jumlah_barang_{{ $loop->iteration }}" value="{{ $detail->jumlah_barang }}">
                                <button class="btn add" type="button">+</button>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" class="detail-harga" name="harga_{{ $loop->iteration }}" value="{{ $detail->harga }}">
                            <label for="">
                                IDR 
                                <input type="text" class="jumlah-harga" name="" value="{{ $detail->harga * $detail->jumlah_barang }}">
                            </label>
                        </td>
                        <td style="border-right: none;">
                            <a class="hapus-row">Hapus</a>
                        </td>
                    </tr>
                    @php
                        $totalHargaKeranjang += ($detail->harga * $detail->jumlah_barang);
                    @endphp
                    @endforeach
                    <tr class="tabel-bot">
                        <td colspan="4" style="border-top:rgba(236, 179, 144, 0.6) 2px solid;">
                            <label>Total Belanja:</label>
                            <label>
                                IDR 
                                <input type="text" id="total-harga-akhir" name="jumlah_harga_barang" value="{{ $totalHargaKeranjang }}">
                            </label>
                        </td>
                    </tr>
            </table>
                </div>
                    <div class="foot">
                        <div class="cta-selanjutnya">
                            <button type="submit" formaction="{{ route('simpanKeranjang') }}">Simpan </button>
                        </div>
                        <div class="cta-selanjutnya">
                            <button type="submit">Simpan dan lanjutkan</button>
                        </div>
                    </div>
                </form>
            </div>
                @endif

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ URL::asset('js/keranjang.js') }}"></script>

@include('layouts.footer')
@endsection