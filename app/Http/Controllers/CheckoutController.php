<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Donation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }


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
        $orderSementara = Order::find($orderId);

        return view('order.keranjang', [
            'order' => $orderSementara
        ]);
    }

    public function afterKeranjang(Request $request)
    {
        $hasAddress = Address::where('costumer_id', Auth::id())->first();
        $orderUser = Order::find($request->order_id);

        if (empty ($hasAddress)) {
            $orderUser->jumlah_harga_barang = $request->jumlah_harga_barang;
            $orderUser->save();

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
        $customer = Customer::find(Auth::id());
        
        $orderId->ongkir = $request->ongkir;
        $orderId->ekspedisi = $request->ekspedisi;
        $orderId->jumlah_pembayaran_akhir = $orderId->jumlah_harga_barang + $request->ongkir;
        
        // bagian payment
        $uniqueId = 'ASMAT-' . rand();

        $orderId->order_unique_id = $uniqueId;
        $orderId->tanggal_pembayaran = Carbon::now();
        $orderId->save();


        $payload = [
            'transaction_details' => [
                'order_id'      => $uniqueId,
                'gross_amount'  => $orderId->jumlah_pembayaran_akhir,
            ],
            'customer_details' => [
                'first_name'    => $customer->nama_depan,
                'last_name'     => $customer->nama_belakang,
                'email'         => $customer->email,
                'phone'         => $customer->telepon,
                // 'address'       => '',
            ],
            // 'item_details' => [
            //     [
            //         'id'       => $donation->donation_type,
            //         'price'    => $donation->amount,
            //         'quantity' => 1,
            //         'name'     => ucwords(str_replace('_', ' ', $donation->donation_type))
            //     ]
            // ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($payload);
        $orderId->snap_token = $snapToken;
        $orderId->save();

        return redirect('pembayaran');
    }   

    public function pembayaran () {
        $orderId = Order::where('customer_id', Auth::id())->where('is_checkout', 0)->first();

        return view('order.pembayaran', [
            'orderInfo' => $orderId
        ]);
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $order = Order::where('order_unique_id', $orderId)->first();

          if ($transaction == 'capture') {
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                $order->setStatusPending();
              } else {
                $order->setStatusSuccess();
              }

            }
          } elseif ($transaction == 'settlement') {

            $order->setStatusSuccess();

          } elseif($transaction == 'pending'){

              $order->setStatusPending();

          } elseif ($transaction == 'deny') {

              $order->setStatusFailed();

          } elseif ($transaction == 'expire') {

              $order->setStatusExpired();

          } elseif ($transaction == 'cancel') {

              $order->setStatusFailed();

          }

        });

        return;
    }
}
