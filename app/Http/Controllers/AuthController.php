<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required'
        ];
 
        $messages = [
            'email.required'        => 'Email tidak boleh kosong',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Kata sandi tidak boleh kosong',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
 
        } else { // false
 
            //Login Fail
            return redirect()->back()->withErrors('Email atau kata sandi anda salah')->withInput();
        }
 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'nama_depan'            => 'required|min:3|max:15',
            'nama_belakang'         => 'required|min:3|max:30',
            'email'                 => 'required|email|unique:customers,email',
            'telepon'               => 'required|min:10|max:20',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'nama_depan.required'   => 'Nama Depan wajib diisi',
            'nama_depan.min'        => 'Nama Depan minimal 3 karakter',
            'nama_depan.max'        => 'Nama Depan maksimal 15 karakter',
            'nama_belakang.required'=> 'Nama Belakang wajib diisi!',
            'nama_belakang.min'     => 'Nama Belakang minimal 3 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
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
        $user->created_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            // Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            // Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
