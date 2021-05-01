@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="detail-barang">
    <div class="showcase">
        <img src="{{ asset('images/' . $product->gambar) }}" alt="">
    </div>
    <div class="detail">
        <div class="top">
            <h2>{{ $product->nama }}</h2>
            <h4>IDR {{ number_format($product->harga, 0, '.', '.') }}</h4>
            <p>{{ $product->deskripsi }}</p>
        </div>
        <div class="bot">
            <form action="{{ route('belanja.store') }}" method="POST">
            @csrf
                <input type="hidden" name="customer_id" value="{{ Auth::id() }}">

                <input type="hidden" name="produk_id" value="{{ $product->id }}">
                <input type="hidden" name="harga" value="{{ $product->harga}}">
                <input type="hidden" name="berat" value="{{ $product->berat}}">

                <div class="quantity">
                    <button class="btn minus-btn" type="button" disabled="disabled">-</button>
                    <input type="text" name="jumlah_barang" id="quantity" value="1">
                    <button class="btn plus-btn" type="button">+</button>
                </div>
                <div class="cta-submit">
                    <button type="submit">Tambah ke keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')

<script>
    document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
    var valueCount
    document.querySelector(".plus-btn").addEventListener("click", function() {
        valueCount = document.getElementById("quantity").value;
        valueCount++;
        document.getElementById("quantity").value = valueCount;
        if (valueCount > 1) {
            document.querySelector(".minus-btn").removeAttribute("disabled");
            document.querySelector(".minus-btn").classList.remove("disabled")
        }
        priceTotal()
    })
    document.querySelector(".minus-btn").addEventListener("click", function() {
        valueCount = document.getElementById("quantity").value;
        valueCount--;
        document.getElementById("quantity").value = valueCount

        if (valueCount == 1) {
            document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
        }
        priceTotal()
    })
</script>

@endsection
    