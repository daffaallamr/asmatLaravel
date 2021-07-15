<div class="body">
    <table class="isi-tabel">
        <tr class="table-top">
            <td>Produk</td>
            <td>Jumlah</td>
            <td>Harga</td>
            <td style="border-right: none;"></td>
        </tr>

        <form action="{{ route('prosesKeranjangSelanjutnya') }}" method="post">
            @csrf
            @if ($order != null)
                <input type="hidden" name="order_id" value="{{ $order->id }}">
            @endif

            @php
                $totalHargaKeranjang = 0;
            @endphp

            @if ($order != null)
                @foreach ($order->orderDetails as $detail)
                {{-- Default value --}}
                <input type="hidden" name="orderDetail_id_{{ $loop->iteration }}" value="{{ $detail->id }}">
                <input type="hidden" name="harga_{{ $loop->iteration }}" value="0">
                <input type="hidden" name="berat_{{ $loop->iteration }}" value="0">
                <input type="hidden" name="jumlah_barang_{{ $loop->iteration }}" value="0">

                <tr class="table-mid">

                    @if ($order->orderDetails->isEmpty())
                        <td colspan="4">
                            <p>Keranjang anda masih kosong!</p>
                        </td>
                    @else

                    <td>
                        <div class="produk">
                            <img src="{{ asset('public/images/' . $detail->product->gambar_1) }}" alt="">
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
                            IDR <input type="text" class="jumlah-harga" name="" value="{{ $detail->harga * $detail->jumlah_barang }}">
                        </label>
                    </td>
                    <td style="border-right: none;">
                        <button class="hapus-row">Hapus</button>
                    </td>

                    @endif

                </tr>

                @php
                    $totalHargaKeranjang += ($detail->harga * $detail->jumlah_barang);
                @endphp

                @endforeach
                <tr class="tabel-bot">
                    <td colspan="4" style="border-top:rgba(236, 179, 144, 0.6) 2px solid;">
                        <label>Total Belanja:</label>
                        <label>
                            IDR <input readonly type="text" id="total-harga-akhir" name="jumlah_harga_barang" value="{{ $totalHargaKeranjang }}">
                        </label>
                    </td>
                </tr>

            @else
                <tr class="table-mid">  
                    <td colspan="4">
                        <p>Keranjang anda masih kosong!</p>
                    </td>
                </tr>
            @endif

    </table>
        </div>
            <div class="foot">
                <div class="cta-belanja">
                    <a href="{{ route('belanja.index') }}">
                    <img src="{{ asset('public/images/arrow.svg') }}" alt="">
                    <span class="underline">Kembali belanja</span>
                    </a>
                </div>
                <div class="cta-simpan">
                    <button type="submit" formaction="{{ route('simpanKeranjang') }}">Simpan</button>
                </div>
                <div class="cta-selanjutnya">
                    <button type="submit">Lanjutkan pembayaran</button>
                </div>
            </div>
        </form>
    </div>