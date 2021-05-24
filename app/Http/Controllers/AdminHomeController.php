<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminHomeController extends Controller
{
    public function index() {
        
        // pesanan perbulan
        $perbulan = Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $pesananPerbulan = $perbulan->count();

        // pesanan pertahun
        $pertahun = Order::whereYear('created_at', Carbon::now()->year)->get();
        $pesananPertahun = $pertahun->count();

        $totalPesanan = Order::all()->count();
        $jumlahCustomer = Customer::all()->count();

        return view('admin.index', [
            'pesananPerbulan' => $pesananPerbulan,
            'pesananPertahun' => $pesananPertahun,
            'totalPesanan' => $totalPesanan,
            'jumlahCustomer' => $jumlahCustomer,
        ]);
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.editProfil', [
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama'                  => 'required|min:2|max:15',
            'username'         => 'required|min:2|max:30',
            'password'              => 'confirmed'
        ];
 
        $messages = [
            'nama.required'   => 'Nama depan wajib diisi',
            'nama.min'        => 'Nama depan minimal 2 karakter',
            'nama.max'        => 'Nama depan maksimal 15 karakter',
            'username.required'=> 'Nama belakang wajib diisi',
            'username.min'     => 'Nama belakang minimal 2 karakter',
            'username.max'     => 'Nama belakang maksimal 30 karakter',
            'password.confirmed'    => 'Kata sandi tidak sama dengan konfirmasi kata sandi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->password == null) {
            $admin = Admin::findOrFail($id);
            $admin->nama = $request->nama;
            $admin->username = $request->username;
            $admin->save();
        } else {
            $admin = Admin::findOrFail($id);
            $admin->nama = $request->nama;
            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->save();
        }

        return redirect()->route('admin.index');
    }
}
