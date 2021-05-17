<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

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
        // dd($request->all());
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
            'nama_depan.required'        => 'Nama Depan wajib diisi',
            'nama_belakang.min'     => 'Nama Belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
            'nama_belakang.required'        => 'Nama belakang wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'telepon.min'           => 'Telepon minimal 10 digit',
            'telepon.required'        => 'Telepon wajib diisi',
            'alamat_lengkap.min'        => 'Alamat lengkap kurang terperinci',
            'alamat_lengkap.required'        => 'Alamat lengkap wajib diisi',
            'province_id.required'      => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_provinsi.required'    => 'Tunggu beberapa detik sebelum konfirmasi',
            'kota_id.required'          => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kota.required'        => 'Tunggu beberapa detik sebelum konfirmasi',
            'kecamatan_id.required'     => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kecamatan.required'   => 'Tunggu beberapa detik sebelum konfirmasi',
            'kode_pos.digits'       => 'Kode pos harus 5 digit',
            'kode_pos.required'        => 'Kode pos wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        
        if($validator->fails()){
            return redirect()->route('profilAlamat')->withErrors($validator)->withInput($request->all);
        }

        $hasAddress = Customer::find(Auth('customer')->id())->addresses->where('is_main', 1)->first();
        $address = new Address();

        if (empty($hasAddress)) {
            $address->customer_id = Auth('customer')->id();
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
            $address->customer_id = Auth('customer')->id();
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
            'nama_depan.required'        => 'Nama Depan wajib diisi',
            'nama_belakang.min'     => 'Nama Belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
            'nama_belakang.required'        => 'Nama belakang wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'telepon.min'           => 'Telepon minimal 10 digit',
            'telepon.required'        => 'Telepon wajib diisi',
            'alamat_lengkap.min'        => 'Alamat lengkap kurang terperinci',
            'alamat_lengkap.required'        => 'Alamat lengkap wajib diisi',
            'province_id.required'      => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_provinsi.required'    => 'Tunggu beberapa detik sebelum konfirmasi',
            'kota_id.required'          => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kota.required'        => 'Tunggu beberapa detik sebelum konfirmasi',
            'kecamatan_id.required'     => 'Tunggu beberapa detik sebelum konfirmasi',
            'nama_kecamatan.required'   => 'Tunggu beberapa detik sebelum konfirmasi',
            'kode_pos.digits'       => 'Kode pos harus 5 digit',
            'kode_pos.required'        => 'Kode pos wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        
        if($validator->fails()){
            return redirect()->route('profilAlamat')->withErrors($validator)->withInput($request->all);
        }

        $address = Address::findOrFail($request->addressId);
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
        $address->save();

        return redirect()->route('profilAlamat');
    }
    
    public function hapusAlamatUtama(Request $request)
    {
        $address = Address::where('id', $request->id)->first();
        $address->delete();

        $addressCadangan = Address::where('customer_id', Auth('customer')->id())->where('is_main', 0)->first();
        
        if(!empty($addressCadangan)) {
            $addressCadangan->is_main = true;
            $addressCadangan->save();
        }

        return redirect()->route('profilAlamat');
    }
    
    public function hapusAlamatCadangan(Request $request)
    {
        $address = Address::where('id', $request->id)->first();
        $address->delete();

        return redirect()->route('profilAlamat');
    }

    public function jadikanAlamatUtama(Request $request)
    {
        $utama = Address::where('id', $request->id_utama)->first();
        $cadangan = Address::where('id', $request->id_cadangan)->first();

        $utama->is_main = false;
        $utama->save();

        $cadangan->is_main = true;
        $cadangan->save();

        return redirect()->route('profilAlamat');
    }


    public function pembelian() {
        $orders = Order::where('customer_id', Auth('customer')->id())->whereNotNull('order_unique_id')->get();
        $listStatus = array();

        foreach ($orders as $order) {
            $ekspedisi = $order->ekspedisi;
            $resi = $order->nomer_resi;

            $statusPaket = $this->statusPaket($resi, $ekspedisi);
            $listStatus[] = $statusPaket;
        }
        
        return view ('profil.pembelian', [
            'orders' => $orders,
            'listStatus' => $listStatus
            ]);
    }

    public function informasiAkun() {
        $customer = Customer::where('id', Auth('customer')->id())->first();

        return view ('profil.informasiAkun', ['customer' => $customer]);
    }

    public function ubahPassword(Request $request) 
    {
        $rules = [
            'password_sekarang'         => ['required', new MatchOldPassword],
            'password_confirmation'     => ['required', 'min:8'],
            'password'                  => ['required', 'min:8', 'confirmed'],
        ];
 
        $messages = [
            'password_sekarang.required'    => 'Kata sandi masih kosong',
            'password.required'             => 'Kata sandi baru masih kosong',
            'password.min'                  => 'Kata sandi baru minimal 8 karakter',
            'password_confirmation.required'             => 'Konfirmasi kata sandi baru masih kosong',
            'password_confirmation.min'                  => 'Konfirmasi kata sandi baru minimal 8 karakter',
            'password.confirmed'                         => 'Konfirmasi kata sandi tidak cocok',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        Customer::find(Auth('customer')->id())->update(['password'=> Hash::make($request->password)]);

        return redirect()->route('profilInformasiAkun')->withErrors('Kata sandi berhasil diubah');
    }
}
