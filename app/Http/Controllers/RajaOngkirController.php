<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Support\Facades\Http;

use Exception;

class RajaOngkirController extends Controller
{
    public function get_province()
    {
        $province =  Province::all();
        return $province;
    }

    public function get_province_name($id)
    {
        $province = Province::where('id', $id)->first();
        return json_encode($province->nama_province);
    }
    

    public function get_city($id)
    {
        $cities = City::where('province_id', $id)->get();
        return json_encode($cities);
    }

    public function get_city_name($id_kota)
    {
        $city = City::findOrFail($id_kota);
        return json_encode($city);
    }

    public function get_kecamatan($id)
    {
        $cities = Subdistrict::where('city_id', $id)->get();
        return json_encode($cities);
    }

    public function get_kecamatan_name($id_kecamatan)
    {
        $subdistrict = Subdistrict::findOrFail($id_kecamatan);
        return json_encode($subdistrict);
    }

    public function ongkir($destination, $weight, $courier)
    {
        // alamat pengiriman
        $origin = 501;

        $response = Http::asForm()->withHeaders([
            'key' => '271fc7c631677fe6b27686dc2e65dad6',
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin,
            'originType' => 'city',
            'destination' => $destination,
            'destinationType' => 'subdistrict',
            'weight' => $weight,
            'courier' => $courier,
        ]);

        $ongkir =  $response['rajaongkir']['results'][0]['costs'];
        return $ongkir;

    }

    public function statusPaket($resi, $ekspedisi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "waybill=$resi&courier=$ekspedisi",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
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

            // $status = $response['rajaongkir'];
            // return $status;

            try {
                $status = $response['rajaongkir']['result']['delivered'];
                return $status;
              }
              //catch exception
              catch(Exception $e) {
                return 3;
              }
        }
    }
}
