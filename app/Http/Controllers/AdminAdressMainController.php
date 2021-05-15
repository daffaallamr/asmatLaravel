<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AdminAdressMainController extends RajaOngkirController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::where('is_main', true)->get();
        $provinsi = $this->get_province();

        return view('admin.address.mainAddress.index', [
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
        return view('admin.address.mainAddress.editData', [
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
        $address = Address::findOrFail($id);
        $address->nama_depan = $request->nama_depan;
        $address->nama_belakang = $request->nama_belakang;
        $address->email = $request->email;
        $address->telepon = $request->telepon;
        $address->alamat_lengkap = $request->alamat_lengkap;
        $address->provinsi_id = $request->provinsi_id;
        $address->kota_id = $request->kota_id;
        $address->kecamatan_id = $request->kecamatan_id;
        $address->kode_pos = $request->kode_pos;
        $address->save();

        return redirect()->route('adminAddressMain.index');
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

        $userId = $address->customer->id;
        $addressCadangan = Address::where('customer_id', $userId)->where('is_main', 0)->first();

        if(!empty($addressCadangan)) {
            $addressCadangan->is_main = true;
            $addressCadangan->save();
        }

        return redirect()->route('adminAddressMain.index');
    }
}
