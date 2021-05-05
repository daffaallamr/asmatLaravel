@extends('layouts.mainCheckout')

@section('content')
    <header>
        <img src="images/logo-2.png" alt="">
        <nav>
            <a href="{{ route('profil-alamat') }}">Data diri</a>  -  <a href="{{ route('pilih-kurir') }}">Pengiriman</a>  -  <span><a href="{{ route('pembayaran') }}">Pembayaran</a></span>
        </nav>
    </header>
    <section style="flex-basis: 60%!important;">
        <table class="pembayaran">
            <tr>
                <td class="met" >
                    <h2>Daftar pesanan</h2>
                </td>
                <td class="ket"><h2>Keterangan</h2></td>
            </tr>
            <tr>
                <td rowspan="2" class="met2">
                    @foreach ($orderInfo->orderDetails as $order)
                        <div class="pesanan">
                            <h5>{{ $order->jumlah_barang }}x {{ $order->product->nama }}</h5>
                            <label>IDR {{ number_format($order->jumlah_harga, 0, '.', '.') }}</label>
                        </div>
                    @endforeach
                </td>
                <td class="totbel"><div class="keterangan"><label for="">Total Belanja: </label><label for="">IDR {{ number_format($orderInfo->jumlah_harga_barang, 0, '.', '.') }}</label></div></td>
            </tr>
            <tr>
                <td class="biakir"><div class="keterangan"><label for="">Biaya Kirim: </label><label for="">IDR {{ number_format($orderInfo->ongkir, 0, '.', '.') }}</label></div></td>
            </tr>
            <tr class="total">
                <td colspan="2" >
                    <div class="keterangan-total" style="font-weight: 500;">
                    <label for="" style="margin-right: 150px;">Total Pembayaran</label>
                    <label for="">IDR {{ number_format($orderInfo->jumlah_pembayaran_akhir, 0, '.', '.') }}</label>
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" id="snap_token" value="{{ $orderInfo->snap_token }}">
            <div class="nav-bot">
                <div class="exit">
                    <a href="{{ route('pilih-kurir') }}"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
                <button type="submit" class="cta-submit" id="pay-button">Konfirmasi</button>
            </div>
    </section>

    <script src="{{
        !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey')
    }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/midtransSnapPayment.js') }}"></script>
@endsection