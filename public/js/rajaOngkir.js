// Script get nama Provinsi 
$(document).ready(function(){
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    $('select[name="province_id"]').on('change', function(){

        let provinceid = $(this).val();
        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if(provinceid){
            // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
                url:"/nama-provinsi/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $("#nama_provinsi").empty();
                    console.log(data);
                    $("#nama_provinsi").val(data);
                }
            });
        } else {
            $('input[name="nama_provinsi"]').val.empty();
        }
    });
});

// {{--  Script mendapat ID Kota  --}}
$(document).ready(function(){
    $('select[name="province_id"]').on('change', function(){

        let provinceid = $(this).val();

        if(provinceid){
            jQuery.ajax({
                url:"/kota/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[name="kota_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="kota_id"]').empty();
        }
    });
});

// {{--  Script mendapat nama Kota  --}}
$(document).ready(function(){
    $('select[name="kota_id"]').on('change', function(){

        let cityid = $(this).val();
        var provinceid = $("#province_id").val();
        console.log(provinceid);

        if(cityid){
            jQuery.ajax({
                url:"/nama-kota/"+cityid+"/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    console.log('Berhasil masuk kota/kabupaten');
                    console.log(data);
                    $("#nama_kota").empty();
                    $("#nama_kota").val(data);
                }
            });
        } else {
            $('input[name="nama_kota"]').val.empty();
        }
    });
});

// {{--  Script mendapatkan Kecamatan ID  --}}
$(document).ready(function(){
    $('select[name="kota_id"]').on('change', function(){

        let cityid = $(this).val();

        if(cityid){
            jQuery.ajax({
                url:"/kecamatan/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[name="kecamatan_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="kecamatan_id"]').append('<option value="'+ value.subdistrict_id +'" namakecamatan="' +value.subdistrict_name+ '">' + 'Kecamatan' + ' ' + value.subdistrict_name + '</option>');
                    });
                }
            });
        }else {
            $('select[name="kecamatan_id"]').empty();
        }
    });
});

// {{--  Script mendapat nama Kota  --}}
$(document).ready(function(){
    $('select[name="kecamatan_id"]').on('change', function(){

        let kecamatan_id = $(this).val();
        var cityid = $("#kota_id").val();
        console.log(cityid);

        if(kecamatan_id){
            jQuery.ajax({
                url:"/nama-kecamatan/"+kecamatan_id+"/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    console.log('Berhasil masuk kecamatan');
                    console.log(data);
                    $("#nama_kecamatan").empty();
                    $("#nama_kecamatan").val(data);
                }
            });
        } else {
            $('input[name="nama_kecamatan"]').val.empty();
        }
    });
});

// {{--  Script mendapat ID Kota default --}}
$(document).ready(function(){
    $('select[id="sunting_1_province_id"]').on('change', function(){
        console.log('Ya masuk');
        let provinceid = $(this).val();

        if(provinceid){
            jQuery.ajax({
                url:"/kota/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="sunting_1_kota_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="sunting_1_kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="sunting_1_kota_id"]').empty();
        }
    });
});