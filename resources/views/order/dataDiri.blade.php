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
            <span><a href="#">Data diri</a></span>  <label>-</label>  <a href="pengiriman.html">Pengiriman</a>  <label>-</label>  <a href="#">Pembayaran</a>
        </nav>
    </header>
    <section>
        <form action="{{ route('simpan-data-diri') }}" method="POST">
            <div class="container">
                @csrf
                <div class="left-col">
                    <label for="">Nama depan</label>
                    <input  type="text" name="nama_depan">
                    <label for="">Nama belakang</label>
                    <input type="text" name="nama_belakang">
                    <label for="">Telepon</label>
                    <input type="text" name="telepon">
                    <label for="">Email</label>
                    <input type="text" name="email"> 
                    <label for="">Alamat lengkap</label>
                    <input type="text" name="alamat_lengkap">
                </div>
                <div class="right-col">
                    <label for="">Provinsi</label>
                        <select name="province_id" id="province_id">
                            <option value="">--- Provinsi Tujuan ---</option>
                            @foreach ($provinsi  as $row)
                            <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                            @endforeach
                        </select>
                    <label for="">Kota</label>
                        <select name="kota_id" id="kota_id"">
                            <option value="">--- Kota Tujuan ---</option>
                        </select>
                    <label for="">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id"">
                            <option value="">--- Kecamatan Tujuan ---</option>
                        </select>
                    </select>
                    <label for="">Kode pos</label>
                    <input type="text" name="kode_pos">
                    <!-- <h3>Email tidak boleh kosong</h3> -->
                    <div class="nav-bot-2">
                        <div class="exit">
                        <a href="profil.html"> <img src="images/arrow.svg" alt="" class="exit-arrow"><span class="underline">Kembali</span></a> </div>
                        <button class="cta-submit">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){

        //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau

        //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
        $('select[name="province_id"]').on('change', function(){

        // kita buat variable provincedid untk menampung data id select province
        let provinceid = $(this).val();

        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if(provinceid){
            // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
                // url yg di root yang kita buat tadi
                url:"/kota/"+provinceid,
                // aksion GET, karena kita mau mengambil data
                type:'GET',
                // type data json
                dataType:'json',
                // jika data berhasil di dapat maka kita mau apain nih
                success:function(data){
                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                    $('select[name="kota_id"]').empty();
                    // jika ada kita looping dengan each
                    $.each(data, function(key, value){
                        // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                        $('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                    });
                }
            });
        }else {
            $('select[name="kota_id"]').empty();
        }
        });
        });
        </script>

        <script>
        $(document).ready(function(){

        //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau

        //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
        $('select[name="kota_id"]').on('change', function(){

        // kita buat variable provincedid untk menampung data id select province
        let cityid = $(this).val();

        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if(cityid){
            // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
                // url yg di root yang kita buat tadi
                url:"/kecamatan/"+cityid,
                // aksion GET, karena kita mau mengambil data
                type:'GET',
                // type data json
                dataType:'json',
                // jika data berhasil di dapat maka kita mau apain nih
                success:function(data){
                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                    $('select[name="kecamatan_id"]').empty();
                    // jika ada kita looping dengan each
                    $.each(data, function(key, value){
                        // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                        $('select[name="kecamatan_id"]').append('<option value="'+ value.subdistrict_id +'" namakota="'+ value.type +' ' +value.subdistrict_name+ '">' + value.type + ' ' + value.subdistrict_name + '</option>');
                    });
                }
            });
        }else {
            $('select[name="kecamatan_id"]').empty();
        }
        });
        });
        </script>

</body>
</html>