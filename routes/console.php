<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Rute Console.
|--------------------------------------------------------------------------
|
| File ini adalah tempat Anda dapat menentukan semua konsol berbasis Closure Anda
| perintah. Setiap Closure terikat pada instansi perintah yang memungkinkan
| pendekatan sederhana untuk berinteraksi dengan metode IO masing-masing perintah.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
