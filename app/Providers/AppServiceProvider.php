<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        // Mendaftarkan Service Biodata 
        $this->app->when('App\Http\Controllers\BiodataController')
            ->needs('App\Domain\Contracts\BiodataInterface')
            ->give('App\Domain\Repositories\BiodataRepository');
        // Mendaftarkan Service Formulir 
        $this->app->when('App\Http\Controllers\FormulirController')
            ->needs('App\Domain\Contracts\FormulirInterface')
            ->give('App\Domain\Repositories\FormulirRepository');
        // Mendaftarkan Service Jurusan 
        $this->app->when('App\Http\Controllers\JurusanController')
            ->needs('App\Domain\Contracts\JurusanInterface')
            ->give('App\Domain\Repositories\JurusanRepository');
        // Mendaftarkan Service Pendaftaran 
        $this->app->when('App\Http\Controllers\PendaftaranController')
            ->needs('App\Domain\Contracts\PendaftaranInterface')
            ->give('App\Domain\Repositories\PendaftaranRepository');
        // Mendaftarkan Service User 
        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
        // Mendaftarkan Service Post Pemberitahuan 
        $this->app->when('App\Http\Controllers\PostController')
            ->needs('App\Domain\Contracts\PostInterface')
            ->give('App\Domain\Repositories\PostRepository');
        // Mendaftarkan Service Panitia 
        $this->app->when('App\Http\Controllers\PanitiaController')
            ->needs('App\Domain\Contracts\PanitiaInterface')
            ->give('App\Domain\Repositories\PanitiaRepository');
        // Mendaftarkan Service Register
        $this->app->when('App\Http\Controllers\UserdaftarController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
    }

}
