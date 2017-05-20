<?php

/**
 * Laravel - Framework PHP untuk Developer Web.
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Daftarkan Auto Loader.
|--------------------------------------------------------------------------
|
| Komposer menyediakan loader kelas yang mudah dibuat secara otomatis
| aplikasi kami. Kita hanya perlu memanfaatkannya! Kita hanya membutuhkannya
| ke script disini agar kita tidak perlu khawatir dengan manual
| loading salah satu kelas kami nanti. Rasanya enak untuk bersantai.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Nyalakan lampunya.
|--------------------------------------------------------------------------
|
| Kita perlu menerangi perkembangan PHP, jadi mari kita nyalakan lampu.
| Ini bootstrap kerangka dan mendapatkannya siap untuk digunakan, maka itu
| akan memuat aplikasi ini sehingga kita bisa menjalankannya dan mengirimnya
| tanggapan kembali ke browser dan menyenangkan pengguna kami.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Jalankan Aplikasi.
|--------------------------------------------------------------------------
|
| Begitu kita memiliki aplikasi, kita bisa menangani permintaan masuk
| melalui kernel, dan mengirim tanggapan terkait kembali
| browser klien memungkinkan mereka menikmati kreatifitas
| dan aplikasi hebat yang telah kami siapkan untuk mereka.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
