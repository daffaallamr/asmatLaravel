@extends('layouts.mainCheckout')

@section('content')
    <header>
        <img src="public/images/logo-2.png" alt="">
        <nav>
            <a href="{{ route('profilAlamat') }}">Data diri</a>  -  <span>
                <a href="{{ route('pilih-kurir') }}">Pengiriman</a>
            </span>  -  <a aria-disabled="true" style="cursor: default">Pembayaran</a>
        </nav>
    </header>
    <form action="{{ route('ongkir') }}" method="POST">
    @csrf
    <section>
        <h2>
            Metode Pengiriman
        </h2>
            <div class="container-metode">
                <div class="metode">
                    <h3>
                        JNE
                    </h3>
                <table>
                    @foreach ($ongkirJNE as $jne)
                    <tr>
                        <td class="Table-1">
                            <div class="content-table">
                                <input type="radio" name="ekspedisi" value="JNE - {{ $jne['service'] }}|{{ $jne['cost'][0]['value'] }}">
                                <label for="">{{ $jne['service'] }} ({{ $jne['cost'][0]['etd'] }} hari)</label>
                            </div>
                        </td>
                        <td class="Table-2">IDR {{ number_format($jne['cost'][0]['value'], 0, '.', '.') }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                <div class="metode">
                    <h3>
                        TIKI
                    </h3>
                <table>
                    @foreach ($ongkirTIKI as $tiki)
                    <tr>
                        <td class="Table-1">
                            <div class="content-table">
                                <input type="radio" name="ekspedisi" value="TIKI - {{ $tiki['service'] }}|{{ $tiki['cost'][0]['value'] }}">
                                <label for="">{{ $tiki['service'] }} ({{ $tiki['cost'][0]['etd'] }} hari)</label>
                            </div>
                        </td>
                        <td class="Table-2">IDR {{ number_format($tiki['cost'][0]['value'], 0, '.', '.') }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                <div class="metode">
                    <h3>
                        POS
                    </h3>
                <table>
                    @foreach ($ongkirPOS as $pos)
                    <tr>
                        <td class="Table-1">
                            <div class="content-table">
                                <input type="radio" name="ekspedisi" value="POS - {{ $pos['service'] }}|{{ $pos['cost'][0]['value'] }}">
                                <label for="">{{ $pos['service'] }} ({{ $pos['cost'][0]['etd'] }} hari)</label>
                            </div>
                        </td>
                        <td class="Table-2">IDR {{ number_format($pos['cost'][0]['value'], 0, '.', '.') }}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
            <div class="alert">
                @if ($errors->any())
                    <p class="alert-content">{{ $errors->first() }}</p>
                @endif
            </div>


        <div class="nav-bot">
            <div class="exit">
                <a href="{{ route('profilAlamat') }}">
                    <img src="public/images/arrow.svg" alt="" class="exit-arrow">
                    <span class="underline">Kembali</span>
                </a>
                </div>
                <button type="submit" class="cta-submit">Selanjutnya</button>
            </div>
        </section>
    </form>
@endsection