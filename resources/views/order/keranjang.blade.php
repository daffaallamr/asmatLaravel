@extends('layouts.main')

@section('content')
@include('layouts.navbar')

<div class="keranjang-belanja">
    <div class="head">
        <h3>Keranjang Belanja</h3>
    </div>
        <div class="body-mobile">
            <div class="tabel-mobile">
                <div class="produk-left">
                    <div class="image-produk">
                        <img src="images/hs.svg" alt="">
                    </div>
                    <div class="info-produk">
                        <label>Hand Sanitizer Spray</label>
                        <div class="quantity2">
                            <button class="btn minus-btn2-mobile" type="button" disabled="disabled">-</button>
                            <input type="text" id="quantity2-mobile" value="1">
                            <button class="btn plus-btn2-mobile" type="button">+</button>
                        </div>
                    </div>
                </div>
                <div class="produk-right">
                    <label for="">IDR 10.000</label>
                    <a id="hapus-mobile" href="#">Hapus</a>
                </div>
            </div>
            <div class="tabel-mobile-2">
                <div class="produk-left">
                    <div class="image-produk">
                        <img src="images/hs.svg" alt="">
                    </div>
                    <div class="info-produk">
                        <label>Hand Sanitizer Spray</label>
                        <div class="quantity3">
                            <button class="btn minus-btn3-mobile" type="button" disabled="disabled">-</button>
                            <input type="text" id="quantity3-mobile" value="1">
                            <button class="btn plus-btn3-mobile" type="button">+</button>
                        </div>
                    </div>
                </div>
                <div class="produk-right">
                    <label for="">IDR 10.000</label>
                    <a id="hapus2-mobile" href="#">Hapus</a>
                </div>
            </div>
            <div class="total">
                <label for="">Total belanja</label>
                <label for="">IDR 20.000</label>
            </div>
        </div>
        <div class="body">
            <table>
                <tr class="table-top">
                    <td>Produk</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                    <td style="border-right: none;"></td>
                </tr>
                @if ($errors->any())
                    <p class="error">{{ $errors->first() }}</p> 
                @endif
                    @foreach ($order->orderDetails as $detail)
                    <form action="{{ route('simpanKeranjang') }}" method="post">
                    @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <tr class="table-mid">
                            <td>
                                <div class="produk">
                                    <img src="{{ asset('images/' . $detail->product->gambar) }}" alt="">
                                    <label for="">{{ $detail->product->nama }}</label>
                                </div>
                            </td>
                            <td>
                                <div class="quantity2">
                                    <button class="btn minus-btn2" type="button" disabled="disabled">-</button>
                                    <input type="text" id="quantity2" name="jumlah_barang" value="{{ $detail->jumlah_barang }}">
                                    <button class="btn plus-btn2" type="button">+</button>
                                </div>
                            </td>
                            <td>
                                <label for="">IDR {{ number_format(($detail->harga * $detail->jumlah_barang), 0, '.', '.') }}</label>
                            </td>
                            <input type="hidden" name="orderDetail_id" value="{{ $detail->id }}">
                            <input type="hidden" name="harga" value="{{ $detail->harga }}">
                            <input type="hidden" name="berat" value="{{ $detail->berat }}">
                            <td style="border-right: none;">
                                <button type="submit" id="simpan">Simpan</button>
                            </td>
                    </form>
                    <form action="{{ route('hapusKeranjang') }}" method="post">
                        @csrf
                        <input type="hidden" name="orderDetail_id" value="{{ $detail->id }}">
                        <td style="border-right: none;">
                            <button type="submit" id="hapus">Hapus</button>
                        </td>
                    </form>
                        </tr>   
                        <tr class="tabel-bot">
                            @endforeach
                            <td colspan="4" style="border-top:rgba(236, 179, 144, 0.6) 2px solid;">
                                <label>Total Belanja:</label>
                                <label>IDR {{ number_format($order->orderDetails->sum('jumlah_harga'), 0, '.', '.') }}</label>
                            </td>
                        </tr>
            </table>
        </div>
        <form action="{{ route('data-diri') }}" method="post">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="jumlah_harga_barang" value="{{ $order->orderDetails->sum('jumlah_harga') }}">
            <div class="foot">
                <div class="cta-selanjutnya">
                    <button type="submit">Simpan dan lanjutkan</button>
                </div>
            </div>
        </form>
    </div>
</div>  
@include('layouts.footer')

<script>
    document.querySelector(".minus-btn2").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn2").addEventListener("click", function() {
        valueCount = document.getElementById("quantity2").value;
        valueCount++;
        document.getElementById("quantity2").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn2").removeAttribute("disabled");
            document.querySelector(".minus-btn2").classList.remove("disabled")
        }
    })
    document.querySelector(".minus-btn2").addEventListener("click", function() {
        valueCount = document.getElementById("quantity2").value;
        valueCount--;
        document.getElementById("quantity2").value = valueCount

        if (valueCount == 1) {
            document.querySelector(".minus-btn2").setAttribute("disabled", "disabled")
        }
    })
    document.querySelector(".minus-btn3").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn3").addEventListener("click", function() {
        valueCount = document.getElementById("quantity3").value;
        valueCount++;
        document.getElementById("quantity3").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn3").removeAttribute("disabled");
            document.querySelector(".minus-btn3").classList.remove("disabled")
        }
    })
    document.querySelector(".minus-btn3").addEventListener("click", function() {
        valueCount = document.getElementById("quantity3").value;
        valueCount--;
        document.getElementById("quantity3").value = valueCount

        if (valueCount == 1) {
            document.querySelector(".minus-btn3").setAttribute("disabled", "disabled")
        }
    })
    document.getElementById("hapus").addEventListener("click", function(){
    document.querySelector('.table-mid').style.display = 'none';
    })
    document.getElementById("hapus2").addEventListener("click", function(){
    document.querySelector('.table-mid-2').style.display = 'none';
    })
    /*Mobile*/
    document.querySelector(".minus-btn2-mobile").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn2-mobile").addEventListener("click", function() {
        valueCount = document.getElementById("quantity2-mobile").value;
        valueCount++;
        document.getElementById("quantity2-mobile").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn2-mobile").removeAttribute("disabled");
            document.querySelector(".minus-btn2-mobile").classList.remove("disabled")
        }
    })
    document.querySelector(".minus-btn2-mobile").addEventListener("click", function() {
        valueCount = document.getElementById("quantity2-mobile").value;
        valueCount--;
        document.getElementById("quantity2-mobile").value = valueCount

        if (valueCount == 1) {
            document.querySelector(".minus-btn2-mobile").setAttribute("disabled", "disabled")
        }
    })
    document.getElementById("hapus-mobile").addEventListener("click", function(){
    document.querySelector('.tabel-mobile').style.display = 'none';
    })
    document.querySelector(".minus-btn3-mobile").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn3-mobile").addEventListener("click", function() {
        valueCount = document.getElementById("quantity3-mobile").value;
        valueCount++;
        document.getElementById("quantity3-mobile").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn3-mobile").removeAttribute("disabled");
            document.querySelector(".minus-btn3-mobile").classList.remove("disabled")
        }
    })
    document.querySelector(".minus-btn3-mobile").addEventListener("click", function() {
        valueCount = document.getElementById("quantity3-mobile").value;
        valueCount--;
        document.getElementById("quantity3-mobile").value = valueCount

        if (valueCount == 1) {
            document.querySelector(".minus-btn3-mobile").setAttribute("disabled", "disabled")
        }
    })
    document.getElementById("hapus2-mobile").addEventListener("click", function(){
    document.querySelector('.tabel-mobile-2').style.display = 'none';
    })
</script>

@endsection