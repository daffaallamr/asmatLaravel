<?php

namespace App\Http\Controllers;

use App\Mail\AdminPesananMasuk;
use App\Mail\PembayaranBerhasil;
use App\Mail\SelesaikanPembayaran;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class CheckoutController extends RajaOngkirController
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function storeOrder(Request $request)
    {
        $orderSementara = new Order();
        $orderDetailBaru = new OrderDetail();
        $customer = Customer::find(Auth('customer')->id());

        // Mencari data order customer, apakah customer punya data keranjang atau belum
        $dataCustomer = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();

        // Jika customer sudah mempunyai keranjang maka data itu menjadi orderSementara
        if (!empty ($dataCustomer)) {
            $orderSementara = $dataCustomer;

            // Order detail yang sudah ada
            $orderDetailLama = OrderDetail::where('order_id', $orderSementara->id)->where('produk_id', $request->produk_id)->first();

            // Jika Order Detail belum ada produk terkait, maka buat data Order Detail baru
            if (empty($orderDetailLama)) {

                $orderDetailBaru->order_id = $orderSementara->id;
                $orderDetailBaru->produk_id = $request->produk_id;
                $orderDetailBaru->harga = $request->harga;
                $orderDetailBaru->berat = $request->berat;
                $orderDetailBaru->jumlah_berat = $request->jumlah_barang * $request->berat;
                $orderDetailBaru->jumlah_barang = $request->jumlah_barang;
                $orderDetailBaru->jumlah_harga = $request->jumlah_barang * $request->harga;
                $orderDetailBaru->save();

            } else {
                // Jika Order detail yang sudah ada produknya sama, maka hanya tambahkan jumlah

                $orderDetailLama->jumlah_berat = $orderDetailLama->berat + ($request->jumlah_barang * $request->berat);
                $orderDetailLama->jumlah_barang = $orderDetailLama->jumlah_barang + $request->jumlah_barang;
                $orderDetailLama->jumlah_harga = $orderDetailLama->jumlah_harga + ($request->jumlah_barang * $request->harga);
                $orderDetailLama->save();  

            }

        // Jika customer belum  mempunyai keranjang maka dibuat data Order    
        } else {
            $orderSementara->customer_id = $request->customer_id;
            $orderSementara->is_checkout = false;
            $orderSementara->email = $customer->email;
            $orderSementara->save();

            $orderDetailBaru->order_id = $orderSementara->id;
            $orderDetailBaru->produk_id = $request->produk_id;
            $orderDetailBaru->harga = $request->harga;
            $orderDetailBaru->berat = $request->berat;
            $orderDetailBaru->jumlah_berat = $request->jumlah_barang * $request->berat;
            $orderDetailBaru->jumlah_barang = $request->jumlah_barang;
            $orderDetailBaru->jumlah_harga = $request->jumlah_barang * $request->harga;
            $orderDetailBaru->save();

            return redirect()->route('keranjang');
        }
        
        return redirect()->route('keranjang');
    }

    public function keranjang()
    {
        // ke keranjang
        $orderSementara = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();

        return view('order.keranjang', [
            'order' => $orderSementara
        ]);
    }

    public function simpanKeranjang(Request $request)
    {
        $countRequest = (count($request->all()) - 3) / 4;
        // dd($request->all());
        
        for ($i = 1; $i <= $countRequest; $i++) {
            $orderDetailId = $request->input('orderDetail_id_'.$i);
            $orderDetail = OrderDetail::where('id', $orderDetailId)->first();
            
            $berat = $request->input('berat_'.$i);
            $harga = $request->input('harga_'.$i);
            $jumlahBarang = $request->input('jumlah_barang_'.$i);
             
            if ($harga == 0) {
                $orderDetail->delete();
            } else {
                $orderDetail->jumlah_barang = $jumlahBarang;
                $orderDetail->jumlah_berat = $berat * $jumlahBarang;
                $orderDetail->jumlah_harga = $harga * $jumlahBarang;
                $orderDetail->save();
            }

        }
        
        return redirect()->route('keranjang');
    }

    public function setelahKeranjang(Request $request)
    {
        $hasAddress = Address::where('customer_id', Auth('customer')->id())->first();
        $orderUser = Order::find($request->order_id);
        // dd($request->all());

        if ($request->jumlah_harga_barang == 0) {

            $orderUser->jumlah_harga_barang = $request->jumlah_harga_barang;
            $orderUser->save();

            return redirect()->back()->withErrors('Keranjang belanja anda masih kosong');

        } else {
            if (empty ($hasAddress)) {
            
                $orderUser->jumlah_harga_barang = $request->jumlah_harga_barang;
                $orderUser->save();
    
                return redirect()->route('formDataDiri');

            } else {
    
                $orderUser->jumlah_harga_barang = $request->jumlah_harga_barang;
                $orderUser->save();
    
                return redirect('pilih-kurir');
            }
        }
    }

    public function formDataDiri(Request $request)
    {
        //memanggil function get_province
        $provinsi = $this->get_province();
    
        return view('order.dataDiri', [
            'provinsi' => $provinsi
        ]);
    }

    public function storeDataDiri(Request $request)
    {
        $rules = [
            'nama_depan'            => 'required|min:2|max:15',
            'nama_belakang'         => 'required|min:2|max:30',
            'telepon'               => ['required', 'regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/', 'min:10'],
            'email'                 => 'required|email',
            'alamat_lengkap'        => 'required|min:5',
            'province_id'           => 'required',
            'nama_provinsi'         => 'required',
            'kota_id'               => 'required',
            'nama_kota'             => 'required',
            'kecamatan_id'          => 'required',
            'nama_kecamatan'        => 'required',
            'kode_pos'              => 'required|digits:5',
        ];
 
        $messages = [
            'nama_depan.min'        => 'Nama Depan minimal 2 karakter',
            'nama_depan.max'        => 'Nama Depan maksimal 15 karakter',
            'nama_depan.required'        => 'Nama Depan wajib diisi',
            'nama_belakang.min'     => 'Nama Belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
            'nama_belakang.required'        => 'Nama belakang wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'telepon.min'           => 'Telepon minimal 10 digit',
            'telepon.required'        => 'Telepon wajib diisi',
            'telepon.regex'        => 'Format telepon tidak valid',
            'alamat_lengkap.min'        => 'Alamat lengkap kurang terperinci',
            'alamat_lengkap.required'        => 'Alamat lengkap wajib diisi',
            'province_id.required'      => 'Pilih Provinsi tujuan',
            'nama_provinsi.required'    => 'Pilih Provinsi tujuan',
            'kota_id.required'          => 'Pilih Kota tujuan',
            'nama_kota.required'        => 'Pilih Kota tujuan',
            'kecamatan_id.required'     => 'Pilih Kecamatan tujuan',
            'nama_kecamatan.required'   => 'Pilih Kecamatan tujuan',
            'kode_pos.digits'       => 'Kode pos harus 5 digit',
            'kode_pos.required'        => 'Kode pos wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->route('formDataDiri')->withErrors($validator)->withInput($request->all);
        }

        $address = new Address;

        $address->customer_id = Auth('customer')->id();
        $address->nama_depan = $request->nama_depan;
        $address->nama_belakang = $request->nama_belakang;
        $address->email = $request->email;
        $address->telepon = Crypt::encryptString($request->telepon);
        $address->alamat_lengkap = Crypt::encryptString($request->alamat_lengkap);
        $address->provinsi_id = $request->province_id;
        $address->provinsi = $request->nama_provinsi;
        $address->kota_id = $request->kota_id;
        $address->kota = $request->nama_kota;
        $address->kecamatan_id = $request->kecamatan_id;
        $address->kecamatan = $request->nama_kecamatan;
        $address->kode_pos = $request->kode_pos;
        $address->is_main = true;
        $address->save();

        return redirect()->route('pilih-kurir');
    }

    public function pilihKurir() {
        $userAddress = Customer::find(Auth('customer')->id())->addresses->where('is_main', 1)->first();
        $userKecamatan = $userAddress->kecamatan_id;

        $orderId = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();
        $totalBeratBarang = 0;

        foreach($orderId->orderDetails as $detail)
        {
            $totalBeratBarang += $detail->jumlah_berat;
        }

        $ongkirJNE = $this->ongkir($userKecamatan, $totalBeratBarang, 'jne');
        $ongkirTIKI = $this->ongkir($userKecamatan, $totalBeratBarang, 'tiki');
        $ongkirPOS = $this->ongkir($userKecamatan, $totalBeratBarang, 'pos');

        return view('order.kurir', [
            'ongkirJNE' => $ongkirJNE,
            'ongkirTIKI' => $ongkirTIKI,
            'ongkirPOS' => $ongkirPOS,
        ]);
    }

    public function storeOngkir(Request $request) {
        $orderId = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();
        $customer = Customer::find(Auth('customer')->id());

        if ($request->ekspedisi == null) {
            return redirect()->route('pilih-kurir')->withErrors('Belum memilih metode pengiriman');
        }

        $ekspedisi = explode('|', $request->ekspedisi);
        $valueEkspedisi = $ekspedisi[0];
        $valueJenisPengiriman = $ekspedisi[1];
        $valueOngkir = $ekspedisi[2];
        
        $orderId->ekspedisi = $valueEkspedisi;
        $orderId->jenis_pengiriman = $valueJenisPengiriman;
        $orderId->ongkir = $valueOngkir;
        $orderId->jumlah_pembayaran_akhir = $orderId->jumlah_harga_barang + $valueOngkir;
        
        // bagian payment
        $uniqueId = 'ASMAT-' . rand();

        $orderId->order_unique_id = $uniqueId;
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
                'phone'         => Crypt::decryptString($customer->telepon),
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($payload);
        $orderId->snap_token = $snapToken;
        $orderId->save();

        return redirect('pembayaran');
    }   

    public function pembayaran () {
        $orderId = Order::where('customer_id', Auth('customer')->id())->where('is_checkout', 0)->first();

        return view('order.pembayaran', [
            'orderInfo' => $orderId
        ]);
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        \DB::transaction(function() use($notif) {   
            
            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;
            
            $order = Order::where('order_unique_id', $orderId)->first();
            $customer = Customer::find($order->customer_id);
            $alamatCustomer = Address::where('customer_id', $order->customer_id)->where('is_main', 1)->first();
            $emailUser = $order->email;

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {

                if($fraud == 'challenge') {
                    $order->setStatusPending();
                } else {
                    $order->setStatusSuccess();
                    Mail::to($emailUser)->send(new PembayaranBerhasil($orderId));
                }

                }
            } elseif ($transaction == 'settlement') {

                $order->setStatusSuccess($type);
                Mail::to($emailUser)->send(new PembayaranBerhasil($orderId));
                Mail::to('tokoasmatpapua@gmail.com')->send(new AdminPesananMasuk($customer, $order, $alamatCustomer));

            } elseif($transaction == 'pending'){

                $order->setStatusPending();
                Mail::to($emailUser)->send(new SelesaikanPembayaran($customer, $order, $alamatCustomer));

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
