<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('is_super', false)->get();
        return view('admin.superAdmin.index', [
            'admins' => $admins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.superAdmin.tambah');
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
            'nama'                  => 'required|min:2|max:15|unique:admins,nama',
            'username'         => 'required|min:2|max:30|unique:admins,username',
            'password'              => 'required|confirmed|min:8'
        ];
 
        $messages = [
            'nama.required'   => 'Nama wajib diisi',
            'nama.min'        => 'Nama minimal 2 karakter',
            'nama.max'        => 'Nama maksimal 15 karakter',
            'nama.unique'          => 'Nama sudah terdaftar',
            'username.required'=> 'Username wajib diisi',
            'username.min'     => 'Username minimal 2 karakter',
            'username.max'     => 'Username maksimal 30 karakter',
            'username.unique'          => 'Username sudah terdaftar',
            'password.required'     => 'Kata sandi wajib diisi',
            'password.min'          => 'Kata sandi  minimal 8 karakter',
            'password.confirmed'    => 'Kata sandi tidak sama dengan konfirmasi kata sandi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $admin = new Admin;
        $admin->nama = $request->nama;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('superAdmin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.superAdmin.edit', [
            'admin' => $admin,
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

        return redirect()->route('superAdmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('superAdmin.index');
    }
}
