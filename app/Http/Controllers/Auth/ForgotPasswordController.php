<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Pengontrol ini bertanggung jawab untuk menangani email reset password dan
    | termasuk sifat yang membantu pengiriman notifikasi
    | aplikasi Anda untuk pengguna Anda. Jangan ragu untuk mengeksplorasi sifat ini.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Buat contoh pengontrol baru.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
