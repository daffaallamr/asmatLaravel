<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer.index', [
            'customers' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_depan'            => 'required|min:2|max:15',
            'nama_belakang'         => 'required|min:2|max:30',
            'email'                 => 'required|email|unique:customers,email',
            'telepon'               => 'required|min:9|max:20',
            'password'              => 'required|confirmed|min:8'
        ];
 
        $messages = [
            'nama_depan.required'   => 'Nama depan wajib diisi',
            'nama_depan.min'        => 'Nama depan minimal 2 karakter',
            'nama_depan.max'        => 'Nama depan maksimal 15 karakter',
            'nama_belakang.required'=> 'Nama belakang wajib diisi',
            'nama_belakang.min'     => 'Nama belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama belakang maksimal 30 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'telepon.required'      => 'Telepon wajib diisi',
            'telepon.min'           => 'Telepon minimal 9 nomer',
            'telepon.max'           => 'Telepon maksimal 20 nomer',
            'password.required'     => 'Kata sandi wajib diisi',
            'password.min'          => 'Kata sandi  minimal 8 karakter',
            'password.confirmed'    => 'Kata sandi tidak sama dengan konfirmasi kata sandi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new Customer;
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->email = strtolower($request->email);
        $user->telepon = $request->telepon;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('adminCustomer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.customer.editData', [
            'customer' => Customer::findOrFail($id)
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
        $rules = [
            'nama_depan'            => 'required|min:2|max:15',
            'nama_belakang'         => 'required|min:2|max:30',
            'email'                 => 'required|email',
            'telepon'               => 'required|min:9|max:20',
            'password'              => 'required|confirmed|min:8'
        ];
 
        $messages = [
            'nama_depan.required'   => 'Nama depan wajib diisi',
            'nama_depan.min'        => 'Nama depan minimal 2 karakter',
            'nama_depan.max'        => 'Nama depan maksimal 15 karakter',
            'nama_belakang.required'=> 'Nama belakang wajib diisi',
            'nama_belakang.min'     => 'Nama belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama belakang maksimal 30 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'telepon.required'      => 'Telepon wajib diisi',
            'telepon.min'           => 'Telepon minimal 9 nomer',
            'telepon.max'           => 'Telepon maksimal 20 nomer',
            'password.required'     => 'Kata sandi wajib diisi',
            'password.min'          => 'Kata sandi  minimal 8 karakter',
            'password.confirmed'    => 'Kata sandi tidak sama dengan konfirmasi kata sandi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = Customer::findOrFail($id);
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->email = strtolower($request->email);
        $user->telepon = $request->telepon;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('adminCustomer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->orders()->delete();
        $customer->delete();

        return redirect()->route('adminCustomer.index');
    }
}
