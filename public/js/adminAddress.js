for (i = 1; i <= dataJS; i++) {
    let defaultIdProvinsi = $('#default_id_provinsi'+i).val();
    let defaultIdKota = $('#default_id_kota'+i).val();
    let defaultIdKecamatan = $('#default_id_kecamatan'+i).val();
    let urutan = i;

    console.log(defaultIdProvinsi)
    console.log(defaultIdKota)
    console.log(defaultIdKecamatan)

    // {{--  Script mendapat nama Provinsi  --}}
    $(function(){
        $("#admin_main_province_id"+urutan).on('change', function(){

            let provinceid = $(this).val();
            $('#admin_main_kecamatan_id'+urutan).empty();
            $('#admin_main_nama_kecamatan'+urutan).empty();
            $('#admin_main_kecamatan_id'+urutan).append('<option value=""> --- Kecamatan Tujuan --- </option>');
            // console.log(provinceid);

            if(provinceid){
                jQuery.ajax({
                    url:"api/asmatLaravel/nama-provinsi/"+provinceid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        // console.log('Berhasil masuk kota/kabupaten');
                        console.log(data);
                        $("#admin_main_nama_provinsi"+urutan).empty();
                        $("#admin_main_nama_provinsi"+urutan).val(data);
                    }
                });
            } else {
                $("#admin_main_nama_provinsi"+urutan).empty();
            }
        });
    });
    
    // {{--  Script mendapat ID Kota  --}}
    $(function(){
        $("#admin_main_province_id"+urutan).val(defaultIdProvinsi);
    
        var listKotaMain = '';
    
        if(defaultIdProvinsi){
            jQuery.ajax({
                url:"api/asmatLaravel/kota/"+defaultIdProvinsi,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('#admin_main_kota_id'+urutan).empty();
                    for (var i = 0;i < data.length; i++) {
                        listKotaMain += '<option value="'+ data[i].id +'">' + data[i].type + ' ' + data[i].nama_city + '</option>';
                    }
                    $('#admin_main_kota_id'+urutan).html(listKotaMain);
                    $('#admin_main_kota_id'+urutan).val(defaultIdKota);
                }
            });
        }
    
    
        $("#admin_main_province_id"+urutan).on('change', function(){
    
            let provinceid = $(this).val();
    
            listKotaMain = '';
    
            if(provinceid){
                jQuery.ajax({
                    url:"api/asmatLaravel/kota/"+provinceid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        $('#admin_main_kota_id'+urutan).empty();
                        for (var i = 0;i < data.length; i++) {
                            listKotaMain += '<option value="'+ data[i].id +'">' + data[i].type + ' ' + data[i].nama_city + '</option>';
                        }
                        $('#admin_main_kota_id'+urutan).html(listKotaMain);
                    }
                });
            } else {
                $('#admin_main_kota_id'+urutan).empty();
            }
    
        });
    
        return false;
    });

    // Mendapatkan nama Kota
    $(function(){
        $('#admin_main_kota_id'+urutan).on('change', function(){
    
            let cityid = $(this).val();
            // console.log(provinceid);
    
            if(cityid){
                jQuery.ajax({
                    url:"api/asmatLaravel/nama-kota/"+cityid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        // console.log('Berhasil masuk kota/kabupaten');
                        $("#admin_main_nama_kota"+urutan).empty();
                        $("#admin_main_nama_kota"+urutan).val(data);
                        $("#admin_main_kode_pos"+urutan).empty();
                        $("#admin_main_kode_pos"+urutan).val(data['postal_code']);
                        console.log($("#admin_main_nama_kota"+urutan).val());
                    }
                });
            } else {
                $("#admin_main_nama_kota"+urutan).val.empty();
            }
        });
    });

    // {{--  Script mendapatkan Kecamatan ID  --}}
    $(function(){
        
        var listKecamatanMain = '';

        if(defaultIdKota){
            jQuery.ajax({
                url:"api/asmatLaravel/kecamatan/"+defaultIdKota,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $("#admin_main_kecamatan_id"+urutan).empty();
                    for (var i = 0;i < data.length; i++) {
                        listKecamatanMain += '<option value="'+ data[i].id +'">' + 'Kecamatan' + ' ' + data[i].nama_subdistrict + '</option>';
                    }
                    $("#admin_main_kecamatan_id"+urutan).html(listKecamatanMain);
                    $("#admin_main_kecamatan_id"+urutan).val(defaultIdKecamatan);
                }
            });
        }else {
            $("#admin_main_kecamatan_id"+urutan).empty();
        }

        $("#admin_main_kota_id"+urutan).on('change', function(){

            let cityid = $(this).val();
            // console.log(cityid)

            listKecamatanMain = '';

            if(cityid){
                jQuery.ajax({
                    url:"api/asmatLaravel/kecamatan/"+cityid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        $("#admin_main_kecamatan_id"+urutan).empty();
                        for (var i = 0;i < data.length; i++) {
                            listKecamatanMain += '<option value="'+ data[i].id +'">' + 'Kecamatan' + ' ' + data[i].nama_subdistrict + '</option>';
                        }
                        $("#admin_main_kecamatan_id"+urutan).html(listKecamatanMain);
                        $("#admin_main_nama_kecamatan"+urutan).val('');
                    }
                });
            }else {
                $("#admin_main_kecamatan_id"+urutan).empty();
            }
        });
        return false;
    });

    // {{--  Script mendapat nama Kecamatan  --}}
    $(function(){
        $("#admin_main_kecamatan_id"+urutan).on('change', function(){

            let kecamatan_id = $(this).val();
            // console.log(cityid);

            if(kecamatan_id){
                jQuery.ajax({
                    url:"api/asmatLaravel/nama-kecamatan/"+kecamatan_id,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        // console.log('Berhasil masuk kecamatan');
                        console.log(data);
                        $("#admin_main_nama_kecamatan"+urutan).empty();
                        $("#admin_main_nama_kecamatan"+urutan).val(data);
                    }
                });
            } else {
                $("admin_main_nama_kecamatan"+urutan).val.empty();
            }
        });
    });

}