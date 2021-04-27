<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asmat</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

</head>
<body class="container-data">
    <header>
        <img src="images/logo-2.png" alt="">
        <nav>
            <a href="#">Data diri</a>  -  <a href="pengiriman.html">Pengiriman</a>  -  <span><a href="#">Pembayaran</a></span>
        </nav>
    </header>
    <section style="flex-basis: 60%!important;">
        <table class="pembayaran">
            <tr>
                <td class="met" >
                    <h2>Metode Pembayaran</h2>
                </td>
                <td class="ket"><h2>Keterangan</h2></td>
            </tr>
            <tr>
                <td rowspan="2" class="met2">
                    <input name="pembayaran" type="radio">
                    <label for="" style="margin-right: 150px;">Bank transfer BCA</label> <br>
                    <input name="pembayaran" type="radio">
                    <label for="">Indomaret</label> 
                </td>
                <td class="totbel"><div class="keterangan"><label for="">Total Belanja: </label><label for="">IDR {{ number_format($orderInfo->jumlah_harga_barang, 0, '.', '.') }}</label></div></td>
            </tr>
            <tr>
                <td class="biakir"><div class="keterangan"><label for="">Biaya Kirim: </label><label for="">IDR {{ number_format($orderInfo->ongkir, 0, '.', '.') }}</label></div></td>
            </tr>
            <tr class="total">
                <td colspan="2" >
                    <div class="keterangan" style="font-weight: 500;">
                    
                    <label for="" style="margin-right: 150px;">Total Pembayaran</label>
                    <label for="">IDR {{ number_format($orderInfo->jumlah_pembayaran_akhir, 0, '.', '.') }}</label>
                    </div>
                </td>
            </tr>
        </table>
            <input type="hidden" id="snap_token" value="{{ $orderInfo->snap_token }}">
            <div class="nav-bot">
                <div class="exit">
                    <a href="pengiriman.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
                <button type="submit" class="cta-submit" id="pay-button">Konfirmasi</button>
            </div>
    </section>

    <script src="{{
        !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey')
    }}"></script>

    <script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    var snapToken = document.getElementById('snap_token').value;
    // For example trigger on button clicked, or any time you need
    payButton.addEventListener('click', function () {
      snap.pay(snapToken); // Replace it with your transaction token
    });
  </script>
</body>
</html>