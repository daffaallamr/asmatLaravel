<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends RajaOngkirController
{
    public function alamat()
    {
        //memanggil function get_province
        $provinsi = $this->get_province();

        $isMain = Customer::find(Auth('customer')->id())->addresses->where('is_main', 1)->first();
        $notMain = Customer::find(Auth('customer')->id())->addresses->where('is_main', 0)->first();

        $checkMain = true;
        $checkNotMain = true;

        if (empty($isMain)) {
            $checkMain = false;
            $checkNotMain = false;

            return view ('profil.alamat', [
                'checkMain'     => $checkMain, 
                'checkNotMain'  => $checkNotMain,
                'provinsi'      => $provinsi,
                ]);

          } elseif (empty($notMain)) {
            $checkNotMain = false;

            return view ('profil.alamat', [
                'checkMain'     => $checkMain, 
                'checkNotMain'  => $checkNotMain,
                'isMain'        => $isMain,
                'provinsi'      => $provinsi,
                ]);

          } else {
                return view ('profil.alamat', [
                    'checkMain'     => $checkMain, 
                    'checkNotMain'  => $checkNotMain,
                    'isMain'        => $isMain,
                    'notMain'       => $notMain,
                    'provinsi'      => $provinsi,
                    ]);
          }
    }

    public function storeAlamat(Request $request)
    {
        $rules = [
            'nama_depan'            => 'required|min:2|max:15',
            'nama_belakang'         => 'required|min:2|max:30',
            'email'                 => 'required|email',
            'telepon'               => 'required|min:10',
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
            'nama_belakang.min'     => 'Nama Belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
            'email.email'           => 'Email tidak valid',
            'telepon.min'           => 'Telepon minimal 10 digit',
            'alamat_lengkap.min'        => 'Alamat lengkap kurang terperinci',
            'province_id.required'      => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_provinsi.required'    => 'Tunggu beberapa detik sebelum konfirmasi',
            'kota_id.required'          => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kota.required'        => 'Tunggu beberapa detik sebelum konfirmasi',
            'kecamatan_id.required'     => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kecamatan.required'   => 'Tunggu beberapa detik sebelum konfirmasi',
            'kode_pos.digits'       => 'Kode pos harus 5 digit',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->route('profilAlamat')->withErrors($validator)->withInput($request->all);
        }

        $hasAddress = Customer::find(Auth('customer')->id())->addresses->where('is_main', 1)->first();
        $address = new Address();

        if (empty($hasAddress)) {
            $address->costumer_id = Auth('customer')->id();
            $address->nama_depan = $request->nama_depan;
            $address->nama_belakang = $request->nama_belakang;
            $address->email = $request->email;
            $address->telepon = $request->telepon;
            $address->alamat_lengkap = $request->alamat_lengkap;
            $address->provinsi_id = $request->province_id;
            $address->provinsi = $request->nama_provinsi;
            $address->kota_id = $request->kota_id;
            $address->kota = $request->nama_kota;
            $address->kecamatan_id = $request->kecamatan_id;
            $address->kecamatan = $request->nama_kecamatan;
            $address->kode_pos = $request->kode_pos;
            $address->is_main = true;
            $address->save();
        } else {
            $address->costumer_id = Auth('customer')->id();
            $address->nama_depan = $request->nama_depan;
            $address->nama_belakang = $request->nama_belakang;
            $address->email = $request->email;
            $address->telepon = $request->telepon;
            $address->alamat_lengkap = $request->alamat_lengkap;
            $address->provinsi_id = $request->province_id;
            $address->provinsi = $request->nama_provinsi;
            $address->kota_id = $request->kota_id;
            $address->kota = $request->nama_kota;
            $address->kecamatan_id = $request->kecamatan_id;
            $address->kecamatan = $request->nama_kecamatan;
            $address->kode_pos = $request->kode_pos;
            $address->is_main = false;
            $address->save();
        }

        return redirect()->route('profilAlamat');
    }

    public function suntingAlamat(Request $request) 
    {
        dd($request->all());
    }


    public function pembelian() {
        $dataOrder = Order::where('customer_id', 1)->get();
        $orderDetail = OrderDetail::where('order_id', '=', [1])->get();
        
        return view ('profil.pembelian', [
            'data' => $orderDetail
            ]);
    }

    public function informasiAkun() {
        return view ('profil.informasiAkun', ['data' => Customer::find(1)]);
    }
}
