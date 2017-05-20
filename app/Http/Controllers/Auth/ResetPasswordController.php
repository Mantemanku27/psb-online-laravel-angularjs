<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller.
    |--------------------------------------------------------------------------
    |
    | Kontroler ini bertanggung jawab untuk menangani permintaan reset kata sandi
    | dan menggunakan sifat sederhana untuk memasukkan perilaku ini. Kamu bebas untuk
    | jelajahi sifat ini dan timpa metode yang ingin Anda tweak.
    |
    */

    use ResetsPasswords;

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
