<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest:admin')->except('logout');
    }

     public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $rules = [
            'username'              => 'required',
            'password'              => 'required'
        ];
 
        $messages = [
            'username.required'     => 'Username tidak boleh kosong',
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
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::guard('admin')->attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('admin.home');
 
        } else { // false
 
            //Login Fail
            return redirect()->back()->withErrors('Username atau kata sandi anda salah')->withInput();
        }
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        Auth::guard('admin')->logout();
        return redirect()->route('login-admin');
    }
}
