<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * URL dasar yang digunakan saat menguji aplikasi.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Membuat aplikasi.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
