<form action="{{ route('prosesKeranjangSelanjutnya') }}" method="post">
    @csrf
    <div class="body-mobile">
        @if ($order != null)
            <input type="hidden" name="order_id" value="{{ $order->id }}">
        @endif

    @php
        $totalHargaKeranjangMobile = 0;
    @endphp

    @if ($order != null)  
        @foreach ($order->orderDetails as $detail)
        <div class="tabel-mobile">

            {{-- Default value --}}
            <input type="hidden" name="orderDetail_id_{{ $loop->iteration }}" value="{{ $detail->id }}">
            <input type="hidden" name="harga_{{ $loop->iteration }}" value="0">
            <input type="hidden" name="berat_{{ $loop->iteration }}" value="0">
            <input type="hidden" name="jumlah_barang_{{ $loop->iteration }}" value="0">

            @if ($order->orderDetails->isEmpty())
                <div id="alert-mobile" style="margin: 0 auto;">
                    <p>Keranjang anda masih kosong</p>
                </div> 
            @else
        
            <div class="produk-left">
                <div class="image-produk">
                    <img src="{{ asset('public/images/products/' . $detail->product->gambar_1) }}" alt="">
                </div>
                <div class="info-produk">
                    <label>{{ $detail->product->nama }}</label>
                        <input type="hidden" name="berat_{{ $loop->iteration }}" value="{{ $detail->product->berat }}">

                    <div class="quantity2">
                        <button class="btn subMobile" type="button">-</button>
                            <input type="text" class="jumlah-barang-mobile" name="jumlah_barang_{{ $loop->iteration }}" value="{{ $detail->jumlah_barang }}">
                        <button class="btn addMobile" type="button">+</button>
                    </div>
                </div>
            </div>
            <div class="produk-right">
                    <input type="hidden" class="detail-harga" name="harga_{{ $loop->iteration }}" value="{{ $detail->harga }}">
                <label for="">
                    IDR <input type="text" class="jumlah-harga-mobile" name="" value="{{ $detail->harga * $detail->jumlah_barang }}">
                </label>
                <button class="hapus-row">Hapus</button>
            </div>
        </div>

        @php
            $totalHargaKeranjangMobile += ($detail->harga * $detail->jumlah_barang);
        @endphp

        @endif
        @endforeach
    
    @else
        <div id="alert-mobile" style="margin: 0 auto;">
            <p>Keranjang anda masih kosong</p>
        </div> 
    @endif
    <div class="total">
        <label for="">Total belanja</label>
        <label>
            IDR <input readonly type="text" id="totalAkhirMobile" name="jumlah_harga_barang" value="{{ $totalHargaKeranjangMobile }}">
        </label>
    </div>
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