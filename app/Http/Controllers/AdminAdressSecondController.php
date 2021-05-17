<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAdressSecondController extends RajaOngkirController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::where('is_main', false)->get();
        $provinsi = $this->get_province();

        return view('admin.address.secondAddress.index', [
            'addresses' => $address,
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.address.editData', [
            'address' => Address::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            return redirect()->route('adminAddressSecond.index')->withErrors($validator)->withInput($request->all);
        }

        $address = Address::findOrFail($id);
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

        return redirect()->route('adminAddressSecond.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->route('adminAddressSecond.index');
    }
}
