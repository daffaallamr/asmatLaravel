<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function get_province(){
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

    public function get_city($id){
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

    public function afterKeranjang(Request $request)
    {
        // $orderSementara = new Order;
        // $orderDetail = new OrderDetail;

        // $hasData = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();

        // if (!empty ($hasData)) {
        //     $orderSementara = $hasData;

        //     $orderDetailLama = OrderDetail::where('order_id', $hasData->id)->where('produk_id', $request->produk_id)->first();
        //     // dd($orderDetailLama);

        //     $orderDetailLama->jumlah_barang = $orderDetailLama->jumlah_barang + $request->jumlah_barang;
        //     $orderDetailLama->jumlah_harga = $orderDetailLama->jumlah_harga + $request->jumlah_barang * $request->harga;
        //     $orderDetailLama->save();

        // } else {
        //     $orderSementara->customer_id = $request->customer_id;
        //     $orderSementara->is_checkout = false;
        //     $orderSementara->save();

        //     $orderDetail->produk_id = $request->produk_id;
        //     $orderDetail->harga = $request->harga;
        //     $orderDetail->order_id = $orderSementara->id;
        //     $orderDetail->jumlah_barang = $request->jumlah_barang;
        //     $orderDetail->jumlah_harga = $request->jumlah_barang * $request->harga;
        //     $orderDetail->save();
        // }

        //memanggil function get_province
        $provinsi = $this->get_province();

        return view('order.dataDiri', [
            'provinsi' => $provinsi
        ]);
    }

    public function storeDataDiri(Request $request) {
        $address = new Address;

        $address->costumer_id = Auth::id();
        $address->nama_depan = $request->nama_depan;
        $address->nama_belakang = $request->nama_belakang;
        $address->email = $request->email;
        $address->telepon = $request->nama_depan;
        $address->alamat_lengkap = $request->nama_depan;
        $address->provinsi_id = $request->province_id;
        $address->kota_id = $request->kota_id;
        $address->kecamatan_id = $request->kecamatan_id;
        $address->kode_pos = $request->kode_pos;
        $address->is_main = 1;
        $address->save();
    }
}
