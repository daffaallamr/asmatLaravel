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
            <a href="#">Data diri</a>  -  <span><a href="pengiriman.html">Pengiriman</a></span>  -  <a href="#">Pembayaran</a>
        </nav>
    </header>
    <section>
        <h2>
            Metode Pengiriman
        </h2>
        <table>
            <form action="{{ route('ongkir') }}" method="POST">
                @csrf
                <h1>JNE</h1>
                @foreach ($kurirJne as $jne)
                <tr>
                    <td class="Table-1">
                        <input type="hidden" name="ekspedisi" value="jne">
                        <input type="radio" name="ongkir" value="{{ $jne['cost'][0]['value'] }}">
                        <label for="">{{ $jne['service'] }} {{ $jne['cost'][0]['etd'] }} Hari</label>
                    </td>
                    <td class="Table-2">IDR {{ number_format($jne['cost'][0]['value'], 0, '.', '.') }}</td>
                </tr>
                @endforeach
            </table>
                <div class="nav-bot">
                    <div class="exit">
                        <a href="informasi-user.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"> <span class="underline">Kembali</span></a>
                    </div>
                    <button type="submit" class="cta-submit" href="pembayaran.html">Selanjutnya</button>
                </div>
            </form>
    </section>
</body>
</html>