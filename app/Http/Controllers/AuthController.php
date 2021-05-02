<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:customer')->except('logout');
    }

    public function showFormLogin()
    {
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|min:8'
        ];
 
        $messages = [
            'email.required'        => 'Email tidak boleh kosong',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Kata sandi tidak boleh kosong',
            'password.min'          => 'Kata sandi kurang dari 8 karakter',
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
 
        Auth::guard('customer')->attempt($data);
 
        if (Auth::check()) {
            // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home-customer');
 
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
            'nama_depan'            => 'required|min:2|max:15',
            'nama_belakang'         => 'required|min:2|max:30',
            'email'                 => 'required|email|unique:customers,email',
            'telepon'               => 'required|min:9|max:20',
            'password'              => 'required|confirmed|min:8'
        ];
 
        $messages = [
            'nama_depan.required'   => 'Nama Depan wajib diisi',
            'nama_depan.min'        => 'Nama Depan minimal 2 karakter',
            'nama_depan.max'        => 'Nama Depan maksimal 15 karakter',
            'nama_belakang.required'=> 'Nama Belakang wajib diisi',
            'nama_belakang.min'     => 'Nama Belakang minimal 2 karakter',
            'nama_belakang.max'     => 'Nama Belakang maksimal 30 karakter',
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
        $user->created_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            // Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login-customer');
        } else {
            // Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::guard('customer')->logout(); // menghapus session yang aktif
        return redirect()->route('login-customer');
    }
}
