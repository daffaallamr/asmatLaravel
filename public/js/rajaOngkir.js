// {{--  Script mendapat nama Provinsi  --}}
$(function(){
    $('select[id="province_id"]').on('change', function(){

        let provinceid = $(this).val();
        // console.log(provinceid);

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/nama-provinsi/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    console.log(data);
                    $("#nama_provinsi").empty();
                    $("#nama_provinsi").val(data);
                }
            });
        } else {
            $('input[id="nama_provinsi"]').val.empty();
        }
    });
});


// {{--  Script mendapat ID Kota  --}}
$(function(){
    $('select[id="province_id"]').on('change', function(){

        let provinceid = $(this).val();
        var listKotaTambah = '';

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/kota/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="kota_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKotaTambah += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
                    }
                    $('select[id="kota_id"]').html(listKotaTambah);
                }
            });
        } else {
            $('select[id="kota_id"]').empty();
        }

    });

    return false;
});

// {{--  Script mendapat nama Kota  --}}
$(function(){
    $('select[id="kota_id"]').on('change', function(){

        let cityid = $(this).val();
        var provinceid = $("#province_id").val();
        // console.log(provinceid);

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/nama-kota/"+cityid+"/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    // console.log(data);
                    $("#nama_kota").empty();
                    $("#nama_kota").val(data);
                }
            });
        } else {
            $('input[id="nama_kota"]').val.empty();
        }
    });
});

// {{--  Script mendapatkan Kecamatan ID  --}}
$(function(){
    $('select[id="kota_id"]').on('change', function(){

        let cityid = $(this).val();
        var listKecamatanTambah = '';

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/kecamatan/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="kecamatan_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKecamatanTambah += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
                    }
                    $('select[id="kecamatan_id"]').html(listKecamatanTambah);
                }
            });
        }else {
            $('select[id="kecamatan_id"]').empty();
        }
    });
    return false;
});

// {{--  Script mendapat nama Kecamatan  --}}
$(function(){
    $('select[id="kecamatan_id"]').on('change', function(){

        let kecamatan_id = $(this).val();
        var cityid = $("#kota_id").val();
        // console.log(cityid);

        if(kecamatan_id){
            jQuery.ajax({
                url:"asmatLaravel/nama-kecamatan/"+kecamatan_id+"/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kecamatan');
                    // console.log(data);
                    $("#nama_kecamatan").empty();
                    $("#nama_kecamatan").val(data);
                }
            });
        } else {
            $('input[id="nama_kecamatan"]').val.empty();
        }
    });
});


// Sunting - 1
// Nilai default dropdown

let defaultKotaSunting_1 = $('#default_sunting_1_kota_id').val();
let defaultKecamatanSunting_1 = $('#default_sunting_1_kecamatan_id').val();

// {{--  Script mendapat nama Provinsi  --}}
$(function(){
    $('select[id="sunting_1_province_id"]').on('change', function(){

        let provinceid = $(this).val();
        // console.log(provinceid);

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/nama-provinsi/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    console.log(data);
                    $("#sunting_1_nama_provinsi").empty();
                    $("#sunting_1_nama_provinsi").val(data);
                }
            });
        } else {
            $('input[id="sunting_1_nama_provinsi"]').val.empty();
        }
    });
});

// {{--  Script mendapat ID Kota  --}}
$(function(){
    let defaultProvinsiSunting_1 = $('#default_sunting_1_provinsi_id').val();
    $("#sunting_1_province_id").val(defaultProvinsiSunting_1);

    var listKota = '';

    if(defaultProvinsiSunting_1){
        jQuery.ajax({
            url:"asmatLaravel/kota/"+defaultProvinsiSunting_1,
            type:'GET',
            dataType:'json',
            success:function(data){
                $('select[id="sunting_1_kota_id"]').empty();
                for (var i = 0;i < data.length; i++) {
                    listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
                }
                $('select[id="sunting_1_kota_id"]').html(listKota);
                $('select[id="sunting_1_kota_id"]').val(defaultKotaSunting_1);
            }
        });
    }


    $('select[id="sunting_1_province_id"]').on('change', function(){

        let provinceid = $(this).val();
        // console.log(provinceid)

        listKota = '';

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/kota/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="sunting_1_kota_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
                    }
                    $('select[id="sunting_1_kota_id"]').html(listKota);
                }
            });
        } else {
            $('select[id="sunting_1_kota_id"]').empty();
        }

    });

    return false;
});

// {{--  Script mendapat nama Kota  --}}
$(function(){
    $('select[id="sunting_1_kota_id"]').on('change', function(){

        let cityid = $(this).val();
        var provinceid = $("#sunting_1_province_id").val();
        // console.log(provinceid);

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/nama-kota/"+cityid+"/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    // console.log(data);
                    $("#sunting_1_nama_kota").empty();
                    $("#sunting_1_nama_kota").val(data);
                }
            });
        } else {
            $('input[id="sunting_1_nama_kota"]').val.empty();
        }
    });
});

// {{--  Script mendapatkan Kecamatan ID  --}}
$(function(){
    
    var listKecamatan = '';

    if(defaultKotaSunting_1){
        jQuery.ajax({
            url:"asmatLaravel/kecamatan/"+defaultKotaSunting_1,
            type:'GET',
            dataType:'json',
            success:function(data){
                $('select[id="sunting_1_kecamatan_id"]').empty();
                for (var i = 0;i < data.length; i++) {
                    listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
                }
                $('select[id="sunting_1_kecamatan_id"]').html(listKecamatan);
                $('select[id="sunting_1_kecamatan_id"]').val(defaultKecamatanSunting_1);
            }
        });
    }else {
        $('select[id="sunting_1_kecamatan_id"]').empty();
    }

    $('select[id="sunting_1_kota_id"]').on('change', function(){

        let cityid = $(this).val();
        // console.log(cityid)

        listKecamatan = '';

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/kecamatan/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="sunting_1_kecamatan_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
                    }
                    $('select[id="sunting_1_kecamatan_id"]').html(listKecamatan);
                }
            });
        }else {
            $('select[id="sunting_1_kecamatan_id"]').empty();
        }
    });
    return false;
});

// {{--  Script mendapat nama Kecamatan  --}}
$(function(){
    $('select[id="sunting_1_kecamatan_id"]').on('change', function(){

        let kecamatan_id = $(this).val();
        var cityid = $("#sunting_1_kota_id").val();
        // console.log(cityid);

        if(kecamatan_id){
            jQuery.ajax({
                url:"asmatLaravel/nama-kecamatan/"+kecamatan_id+"/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kecamatan');
                    // console.log(data);
                    $("#sunting_1_nama_kecamatan").empty();
                    $("#sunting_1_nama_kecamatan").val(data);
                }
            });
        } else {
            $('input[id="sunting_1_nama_kecamatan"]').val.empty();
        }
    });
});



// Sunting - 2
// Nilai default dropdown

let defaultKotaSunting_2 = $('#default_sunting_2_kota_id').val();
let defaultKecamatanSunting_2 = $('#default_sunting_2_kecamatan_id').val();

// {{--  Script mendapat nama Provinsi  --}}
$(function(){
    $('select[id="sunting_2_province_id"]').on('change', function(){

        let provinceid = $(this).val();
        // console.log(provinceid);

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/nama-provinsi/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    console.log(data);
                    $("#sunting_2_nama_provinsi").empty();
                    $("#sunting_2_nama_provinsi").val(data);
                }
            });
        } else {
            $('input[id="sunting_2_nama_provinsi"]').val.empty();
        }
    });
});

// {{--  Script mendapat ID Kota  --}}
$(function(){
    let defaultProvinsiSunting_2 = $('#default_sunting_2_provinsi_id').val();
    $("#sunting_2_province_id").val(defaultProvinsiSunting_2);

    var listKota = '';

    if(defaultProvinsiSunting_2){
        jQuery.ajax({
            url:"asmatLaravel/kota/"+defaultProvinsiSunting_2,
            type:'GET',
            dataType:'json',
            success:function(data){
                $('select[id="sunting_2_kota_id"]').empty();
                for (var i = 0;i < data.length; i++) {
                    listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
                }
                $('select[id="sunting_2_kota_id"]').html(listKota);
                $('select[id="sunting_2_kota_id"]').val(defaultKotaSunting_2);
            }
        });
    }


    $('select[id="sunting_2_province_id"]').on('change', function(){

        let provinceid = $(this).val();
        // console.log(provinceid)

        listKota = '';

        if(provinceid){
            jQuery.ajax({
                url:"asmatLaravel/kota/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="sunting_2_kota_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
                    }
                    $('select[id="sunting_2_kota_id"]').html(listKota);
                }
            });
        } else {
            $('select[id="sunting_2_kota_id"]').empty();
        }

    });

    return false;
});

// {{--  Script mendapat nama Kota  --}}
$(function(){
    $('select[id="sunting_2_kota_id"]').on('change', function(){

        let cityid = $(this).val();
        var provinceid = $("#sunting_2_province_id").val();
        // console.log(provinceid);

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/nama-kota/"+cityid+"/"+provinceid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kota/kabupaten');
                    // console.log(data);
                    $("#sunting_2_nama_kota").empty();
                    $("#sunting_2_nama_kota").val(data);
                }
            });
        } else {
            $('input[id="sunting_2_nama_kota"]').val.empty();
        }
    });
});

// {{--  Script mendapatkan Kecamatan ID  --}}
$(function(){
    
    var listKecamatan = '';

    if(defaultKotaSunting_2){
        jQuery.ajax({
            url:"asmatLaravel/kecamatan/"+defaultKotaSunting_2,
            type:'GET',
            dataType:'json',
            success:function(data){
                $('select[id="sunting_2_kecamatan_id"]').empty();
                for (var i = 0;i < data.length; i++) {
                    listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
                }
                $('select[id="sunting_2_kecamatan_id"]').html(listKecamatan);
                $('select[id="sunting_2_kecamatan_id"]').val(defaultKecamatanSunting_2);
            }
        });
    }else {
        $('select[id="sunting_2_kecamatan_id"]').empty();
    }

    $('select[id="sunting_2_kota_id"]').on('change', function(){

        let cityid = $(this).val();
        // console.log(cityid)

        listKecamatan = '';

        if(cityid){
            jQuery.ajax({
                url:"asmatLaravel/kecamatan/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('select[id="sunting_2_kecamatan_id"]').empty();
                    for (var i = 0;i < data.length; i++) {
                        listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
                    }
                    $('select[id="sunting_2_kecamatan_id"]').html(listKecamatan);
                }
            });
        }else {
            $('select[id="sunting_2_kecamatan_id"]').empty();
        }
    });
    return false;
});

// {{--  Script mendapat nama Kecamatan  --}}
$(function(){
    $('select[id="sunting_2_kecamatan_id"]').on('change', function(){

        let kecamatan_id = $(this).val();
        var cityid = $("#sunting_2_kota_id").val();
        // console.log(cityid);

        if(kecamatan_id){
            jQuery.ajax({
                url:"asmatLaravel/nama-kecamatan/"+kecamatan_id+"/"+cityid,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log('Berhasil masuk kecamatan');
                    // console.log(data);
                    $("#sunting_2_nama_kecamatan").empty();
                    $("#sunting_2_nama_kecamatan").val(data);
                }
            });
        } else {
            $('input[id="sunting_2_nama_kecamatan"]').val.empty();
        }
    });
});


// // Admin - main
// // Nilai default dropdown

// let defaultKotaMain = $('#default_main_kota_id').val();
// let defaultKecamatanMain = $('#default_main_kecamatan_id').val();

// // {{--  Script mendapat nama Provinsi  --}}
// $(function(){
//     $('select[id="main_province_id"]').on('change', function(){

//         let provinceid = $(this).val();
//         // console.log(provinceid);

//         if(provinceid){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-provinsi/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kota/kabupaten');
//                     console.log(data);
//                     $("#main_nama_provinsi").empty();
//                     $("#main_nama_provinsi").val(data);
//                 }
//             });
//         } else {
//             $('input[id="main_nama_provinsi"]').val.empty();
//         }
//     });
// });

// // {{--  Script mendapat ID Kota  --}}
// $(function(){
//     let defaultProvinsiMain = $('#default_main_provinsi_id').val();
//     $("#main_province_id").val(defaultProvinsiMain);

//     var listKotaMain = '';

//     if(defaultProvinsiMain){
//         jQuery.ajax({
//             url:"asmatLaravel/kota/"+defaultProvinsiMain,
//             type:'GET',
//             dataType:'json',
//             success:function(data){
//                 $('select[id="main_kota_id"]').empty();
//                 for (var i = 0;i < data.length; i++) {
//                     listKotaMain += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
//                 }
//                 $('select[id="main_kota_id"]').html(listKotaMain);
//                 $('select[id="main_kota_id"]').val(defaultKotaMain);
//             }
//         });
//     }


//     $('select[id="main_province_id"]').on('change', function(){

//         let provinceid = $(this).val();
//         // console.log(provinceid)

//         listKotaMain = '';

//         if(provinceid){
//             jQuery.ajax({
//                 url:"asmatLaravel/kota/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     $('select[id="main_kota_id"]').empty();
//                     for (var i = 0;i < data.length; i++) {
//                         listKotaMain += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
//                     }
//                     $('select[id="main_kota_id"]').html(listKotaMain);
//                 }
//             });
//         } else {
//             $('select[id="main_kota_id"]').empty();
//         }

//     });

//     return false;
// });

// // {{--  Script mendapat nama Kota  --}}
// $(function(){
//     $('select[id="main_kota_id"]').on('change', function(){

//         let cityid = $(this).val();
//         var provinceid = $("#main_province_id").val();
//         // console.log(provinceid);

//         if(cityid){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-kota/"+cityid+"/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kota/kabupaten');
//                     // console.log(data);
//                     $("#main_nama_kota").empty();
//                     $("#main_nama_kota").val(data);
//                 }
//             });
//         } else {
//             $('input[id="main_nama_kota"]').val.empty();
//         }
//     });
// });

// // {{--  Script mendapatkan Kecamatan ID  --}}
// $(function(){
    
//     var listKecamatanMain = '';

//     if(defaultKotaMain){
//         jQuery.ajax({
//             url:"asmatLaravel/kecamatan/"+defaultKotaMain,
//             type:'GET',
//             dataType:'json',
//             success:function(data){
//                 $('select[id="main_kecamatan_id"]').empty();
//                 for (var i = 0;i < data.length; i++) {
//                     listKecamatanMain += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
//                 }
//                 $('select[id="main_kecamatan_id"]').html(listKecamatanMain);
//                 $('select[id="main_kecamatan_id"]').val(defaultKecamatanMain);
//             }
//         });
//     }else {
//         $('select[id="main_kecamatan_id"]').empty();
//     }

//     $('select[id="main_kota_id"]').on('change', function(){

//         let cityid = $(this).val();
//         // console.log(cityid)

//         listKecamatanMain = '';

//         if(cityid){
//             jQuery.ajax({
//                 url:"asmatLaravel/kecamatan/"+cityid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     $('select[id="main_kecamatan_id"]').empty();
//                     for (var i = 0;i < data.length; i++) {
//                         listKecamatanMain += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
//                     }
//                     $('select[id="main_kecamatan_id"]').html(listKecamatanMain);
//                 }
//             });
//         }else {
//             $('select[id="main_kecamatan_id"]').empty();
//         }
//     });
//     return false;
// });

// // {{--  Script mendapat nama Kecamatan  --}}
// $(function(){
//     $('select[id="main_kecamatan_id"]').on('change', function(){

//         let kecamatan_id = $(this).val();
//         var cityid = $("#main_kota_id").val();
//         // console.log(cityid);

//         if(kecamatan_id){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-kecamatan/"+kecamatan_id+"/"+cityid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kecamatan');
//                     // console.log(data);
//                     $("#main_nama_kecamatan").empty();
//                     $("#main_nama_kecamatan").val(data);
//                 }
//             });
//         } else {
//             $('input[id="main_nama_kecamatan"]').val.empty();
//         }
//     });
// });

// // Admin - second
// // Nilai default dropdown

// let defaultKotaSecond = $('#default_second_kota_id').val();
// let defaultKecamatanSecond = $('#default_second_kecamatan_id').val();

// // {{--  Script mendapat nama Provinsi  --}}
// $(function(){
//     $('select[id="second_province_id"]').on('change', function(){

//         let provinceid = $(this).val();
//         // console.log(provinceid);

//         if(provinceid){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-provinsi/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kota/kabupaten');
//                     console.log(data);
//                     $("#second_nama_provinsi").empty();
//                     $("#second_nama_provinsi").val(data);
//                 }
//             });
//         } else {
//             $('input[id="second_nama_provinsi"]').val.empty();
//         }
//     });
// });

// // {{--  Script mendapat ID Kota  --}}
// $(function(){
//     let defaultProvinsiSecond = $('#default_second_provinsi_id').val();
//     $("#second_province_id").val(defaultProvinsiSecond);

//     var listKota = '';

//     if(defaultProvinsiSecond){
//         jQuery.ajax({
//             url:"asmatLaravel/kota/"+defaultProvinsiSecond,
//             type:'GET',
//             dataType:'json',
//             success:function(data){
//                 $('select[id="second_kota_id"]').empty();
//                 for (var i = 0;i < data.length; i++) {
//                     listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
//                 }
//                 $('select[id="second_kota_id"]').html(listKota);
//                 $('select[id="second_kota_id"]').val(defaultKotaSecond);
//             }
//         });
//     }


//     $('select[id="second_province_id"]').on('change', function(){

//         let provinceid = $(this).val();
//         // console.log(provinceid)

//         listKota = '';

//         if(provinceid){
//             jQuery.ajax({
//                 url:"asmatLaravel/kota/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     $('select[id="second_kota_id"]').empty();
//                     for (var i = 0;i < data.length; i++) {
//                         listKota += '<option value="'+ data[i].city_id +'">' + data[i].type + ' ' + data[i].city_name + '</option>';
//                     }
//                     $('select[id="second_kota_id"]').html(listKota);
//                 }
//             });
//         } else {
//             $('select[id="second_kota_id"]').empty();
//         }

//     });

//     return false;
// });

// // {{--  Script mendapat nama Kota  --}}
// $(function(){
//     $('select[id="second_kota_id"]').on('change', function(){

//         let cityid = $(this).val();
//         var provinceid = $("#second_province_id").val();
//         // console.log(provinceid);

//         if(cityid){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-kota/"+cityid+"/"+provinceid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kota/kabupaten');
//                     // console.log(data);
//                     $("#second_nama_kota").empty();
//                     $("#second_nama_kota").val(data);
//                 }
//             });
//         } else {
//             $('input[id="second_nama_kota"]').val.empty();
//         }
//     });
// });

// // {{--  Script mendapatkan Kecamatan ID  --}}
// $(function(){
    
//     var listKecamatan = '';

//     if(defaultKotaSecond){
//         jQuery.ajax({
//             url:"asmatLaravel/kecamatan/"+defaultKotaSecond,
//             type:'GET',
//             dataType:'json',
//             success:function(data){
//                 $('select[id="second_kecamatan_id"]').empty();
//                 for (var i = 0;i < data.length; i++) {
//                     listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
//                 }
//                 $('select[id="second_kecamatan_id"]').html(listKecamatan);
//                 $('select[id="second_kecamatan_id"]').val(defaultKecamatanSecond);
//             }
//         });
//     }else {
//         $('select[id="second_kecamatan_id"]').empty();
//     }

//     $('select[id="second_kota_id"]').on('change', function(){

//         let cityid = $(this).val();
//         // console.log(cityid)

//         listKecamatan = '';

//         if(cityid){
//             jQuery.ajax({
//                 url:"asmatLaravel/kecamatan/"+cityid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     $('select[id="second_kecamatan_id"]').empty();
//                     for (var i = 0;i < data.length; i++) {
//                         listKecamatan += '<option value="'+ data[i].subdistrict_id +'">' + 'Kecamatan' + ' ' + data[i].subdistrict_name + '</option>';
//                     }
//                     $('select[id="second_kecamatan_id"]').html(listKecamatan);
//                 }
//             });
//         }else {
//             $('select[id="second_kecamatan_id"]').empty();
//         }
//     });
//     return false;
// });

// // {{--  Script mendapat nama Kecamatan  --}}
// $(function(){
//     $('select[id="second_kecamatan_id"]').on('change', function(){

//         let kecamatan_id = $(this).val();
//         var cityid = $("#second_kota_id").val();
//         // console.log(cityid);

//         if(kecamatan_id){
//             jQuery.ajax({
//                 url:"asmatLaravel/nama-kecamatan/"+kecamatan_id+"/"+cityid,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(data){
//                     // console.log('Berhasil masuk kecamatan');
//                     // console.log(data);
//                     $("#second_nama_kecamatan").empty();
//                     $("#second_nama_kecamatan").val(data);
//                 }
//             });
//         } else {
//             $('input[id="second_nama_kecamatan"]').val.empty();
//         }
//     });
// });