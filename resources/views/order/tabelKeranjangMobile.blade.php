<form action="{{ route('prosesKeranjangSelanjutnya') }}" method="post">
    @csrf
    <div class="body-mobile">
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

        @if ($order->orderDetails->isEmpty())
            {{--  <div class="alert-mobile">
                <p>Keranjang anda masih kosong</p>
            </div>  --}}
        @else
    
        <div class="produk-left">
            <div class="image-produk">
                <img src="images/hs.svg" alt="">
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
                IDR <input type="text" class="jumlah-harga" name="" value="{{ $detail->harga * $detail->jumlah_barang }}">
            </label>
            <button class="hapus-row">Hapus</button>
        </div>
    </div>

    @php
        $totalHargaKeranjangMobile += ($detail->harga * $detail->jumlah_barang);
    @endphp

    @endif
    @endforeach
    <div class="total">
        <label for="">Total belanja</label>
        <label>
            IDR <input type="text" id="total-harga-akhir" name="jumlah_harga_barang" value="{{ $totalHargaKeranjangMobile }}">
        </label>
    </div>
</div>
<div class="foot">
    <div class="cta-simpan">
        <button type="submit" formaction="{{ route('simpanKeranjang') }}">Simpan </button>
    </div>
    <div class="cta-selanjutnya">
        <button type="submit">Simpan dan lanjutkan</button>
    </div>
</div>
</form>