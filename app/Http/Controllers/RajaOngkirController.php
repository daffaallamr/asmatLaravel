<?php

namespace App\Http\Controllers;

class RajaOngkirController extends Controller
{
    public function get_province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);

            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_province_name($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/province?id=$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);

            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $nama_provinsi = $response['rajaongkir']['results']['province'];
            return json_encode($nama_provinsi);
        }
    }
    

    public function get_city($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/city?&province=$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }

    public function get_city_name($id_kota, $id_provinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/city?id=$id_kota&province=$id_provinsi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $nama_kota = $response['rajaongkir']['results']['type'] . " " . $response['rajaongkir']['results']['city_name'];
            return json_encode($nama_kota);
        }
    }

    public function get_kecamatan($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_kecamatan = $response['rajaongkir']['results'];
            return json_encode($data_kecamatan);
        }
    }

    public function get_kecamatan_name($id_kecamatan, $id_kota) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?id=$id_kecamatan&city=$id_kota",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 271fc7c631677fe6b27686dc2e65dad6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $nama_kecamatan =  "Kecamatan " . $response['rajaongkir']['results']['subdistrict_name'];
            return json_encode($nama_kecamatan);
        }
    }
}
