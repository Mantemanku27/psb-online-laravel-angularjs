<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Daftar pengontrol.
    |--------------------------------------------------------------------------
    |
    | Pengendali ini menangani pendaftaran pengguna baru dan juga akun mereka.
    | Validasi dan penciptaan secara default pengontrol ini menggunakan ciri
    | memberikan fungsi ini tanpa memerlukan kode tambahan.
    |
    */

    use RegistersUsers;

    /**
     * Dimana bisa mengarahkan pengguna setelah login / registrasi.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Buat contoh pengontrol baru.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Dapatkan validator untuk permintaan pendaftaran masuk.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Buat contoh pengguna baru setelah pendaftaran yang valid.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
