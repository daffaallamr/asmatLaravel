<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
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

    public function keranjang($orderId)
    {
        // ke keranjang
        $orderSementara = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();
        dd($orderId);

        return view('order.keranjang', [
            'order' => $orderSementara
        ]);
    }

    public function afterKeranjang(Request $request)
    {
        $hasAddress = Address::where('costumer_id', Auth::id())->first();
        $orderUser = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();

        if (empty ($hasAddress)) {
            //memanggil function get_province
            $provinsi = $this->get_province();

            return view('order.dataDiri', [
                'provinsi' => $provinsi
            ]);
        } else {
            $orderUser->jumlah_harga_barang = $request->jumlah_harga_barang;
            $orderUser->save();

            return redirect('pilih-kurir');
        }

    }

    public function storeDataDiri(Request $request) {

        $address = new Address;

        $address->costumer_id = Auth::id();
        $address->nama_depan = $request->nama_depan;
        $address->nama_belakang = $request->nama_belakang;
        $address->email = $request->email;
        $address->telepon = $request->telepon;
        $address->alamat_lengkap = $request->alamat_lengkap;
        $address->provinsi_id = $request->province_id;
        $address->kota_id = $request->kota_id;
        $address->kecamatan_id = $request->kecamatan_id;
        $address->kode_pos = $request->kode_pos;
        $address->is_main = 1;
        $address->save();

        return redirect('pilih-kurir');
    }

    public function pilihKurir() {
        $userAddress = Customer::find(Auth::id())->addresses->where('is_main', 1)->first();
        $userKecamatan = $userAddress->kecamatan_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=151&originType=city&destination=$userKecamatan&destinationType=subdistrict&weight=1000&courier=jne",
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
            $jne_result = $response['rajaongkir']['results'][0]['costs'];
        }

        return view('order.kurir', [
            'kurirJne' => $jne_result
        ]);
    }

    public function storeOngkir(Request $request) {
        $orderId = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();
        
        $orderId->ongkir = $request->ongkir;
        $orderId->ekspedisi = $request->ekspedisi;
        $orderId->jumlah_pembayaran_akhir = $orderId->jumlah_harga_barang + $request->ongkir;

        $orderId->save();

        return redirect('pembayaran');
    }   

    public function pembayaran () {
        $orderInfo = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();

        return view('order.pembayaran', [
            'orderInfos' => $orderInfo
        ]);
    }
}
