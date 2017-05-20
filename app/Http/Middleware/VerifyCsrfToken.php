<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * URI yang harus dikeluarkan dari verifikasi CSRF.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
