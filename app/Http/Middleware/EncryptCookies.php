<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
{
    /**
     * Nama cookie yang tidak boleh dienkripsi.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
