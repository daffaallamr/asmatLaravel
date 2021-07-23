@extends('layouts.main')

@section('content')
@include('layouts.navbar')
<div class="faq">
    <div class="container">
        <h2>Pertanyaan & Jawaban</h2>
        <div class="accordion">
            <div class="contentBx">
                <label for="">Apa itu Asmat</label>
                <div class="content">
                    <p>ASMAT, Advancing Sustainable Market merupakan marketplace atau platform perantara yang menghubungkan penjual dan pembeli secara online. Platform ini dibuat untuk menyediakan ruang pemasaran bagi produk-produk yang dihasilkan oleh masyarakat sekitar hutan dan adat di Indonesia. Mereka menghasilkan produk yang dijual melalui platform ini dengan semangat untuk memenuhi sumber penghidupan tanpa harus merusak hutan atau menebang pohon.</p>
                </div>
            </div>
            <div class="contentBx">
                <label for="">Kenapa harus Asmat</label>
                <div class="content">
                    <p>ASMAT bukan saja sebagai etalase bagi para produsen yang produknya dipasarkan melalui media ini. ASMAT juga sebagai tempat informasi bagaimana hutan Indonesia dan khsusunya hutan Papua dijaga oleh masyarakat adat dan masyarakat sekitar hutan. Dengan melakukan transaksi pembelian di ASMAT, anda juga terlibat untuk melindungi hutan di Indonesia dan khususnya Papua.</p>
                </div>
            </div>
            <div class="contentBx">
                <label for="">Produk Asmat</label>
                <div class="content">
                    <div class="container">
                        @foreach ($products as $product)    
                            <div class="produkbox" onclick="location.href='{{ route('belanja.show', ['belanja' => $product->slug]) }}'" style="cursor: pointer" >
                                <img src="{{ asset('public/images/products/' . $product->gambar_1) }}" alt="">
                                <div class="content-produkbox">
                                    <h2>{{ $product->nama }}</h2>
                                    <p>IDR {{ number_format($product->harga, 0, '.', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
    const accordion = document.getElementsByClassName
    ('contentBx');
    for (i = 0; i<accordion.length; i++){
        accordion[i].addEventListener('click', function(){
            this.classList.toggle('active')
        })
    }
</script>
@endsection
    