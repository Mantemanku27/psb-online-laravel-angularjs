<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller.
    |--------------------------------------------------------------------------
    |
    | Pengontrol ini menangani otentikasi pengguna untuk aplikasi dan
    | mengarahkan mereka ke layar utama Anda. Pengontrol menggunakan sifat
    | untuk menyediakan fungsionalitasnya dengan mudah ke aplikasi Anda.
    |
    */

    use AuthenticatesUsers;

    /**
     * Tempat untuk mengarahkan pengguna setelah masuk.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Buat contoh pengontrol baru.
     *
     * @return void
     */
    // login
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(UserLoginRequest $request)
    {
        // tergantung field login
        if (Auth::attempt($request->only('email', 'password'), true)) {
            //  session()->put('konfirmasi', Auth::user()->konfirmasi);
         if (Auth::user()->konfirmasi == '0'){
            session()->put('nama', Auth::user()->nama);
            session()->put('email', Auth::user()->email);
            session()->put('level', Auth::user()->level);
            session()->put('user_id', Auth::user()->id);
            
            // sukses masuk pendaftaran
            return redirect()->route('pendaftaran');
         }
         else{
             Auth::logout();
            session()->flash('auth_message', 'Email Belum diKonfirmasi!');
            return redirect()->route('login'); 
         }
        }
         else {
            // gagal masuk ke login
            session()->flash('auth_message', 'Kombinasi email dan password salah!');
            return redirect()->route('login');
        }

    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
    // end login
}
