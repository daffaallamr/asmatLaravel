<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asmat</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/observer.js') }}">
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
                <td class="totbel"><div class="keterangan"><label for="">Total Belanja: </label><label for="">IDR 10.000</label></div></td>
            </tr>
            <tr>
                <td class="biakir"><div class="keterangan"><label for="">Biaya Kirim: </label><label for="">IDR 10.000</label></div></td>
            </tr>
            <tr class="total">
                <td colspan="2" >
                    <div class="keterangan" style="font-weight: 500;">
                    <label for="" style="margin-right: 150px;">Total Pembayaran</label>
                    <label for="">IDR 20.000</label>
                    </div>
                </td>
            </tr>
        </table>
        <div class="nav-bot">
            <div class="exit">
                <a href="pengiriman.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
            <button class="cta-submit" id="konfirmasi" href="#">Konfirmasi</button>
        </div>
    </section>
    <div class="popup-ubah">
        <h2>Apakah anda yakin &quest;</h2>
        <div class="nav-bot">
            <div class="exit">
            <a href="pembayaran.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
            <button class="cta-submit" href="pengiriman.html">Ya</button>
        </div>
    </div>
    <div class="popup-bg">
    </div>
    <script>
        document.getElementById('konfirmasi').addEventListener('click',function() {
        document.querySelector('.popup-ubah').style.display = 'block';
        document.querySelector('.popup-ubah').style.opacity = '1';
        document.querySelector('.popup-bg').style.display = 'block';
        document.querySelector('.popup-bg').style.opacity = '0.2'; 
});
    </script>
</body>
</html>