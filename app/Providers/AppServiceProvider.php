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
         // mendaftarkan post 
        $this->app->when('App\Http\Controllers\PostController')
            ->needs('App\Domain\Contracts\PostInterface')
            ->give('App\Domain\Repositories\PostRepository');
         // mendaftarkan jurusan 
        $this->app->when('App\Http\Controllers\JurusanController')
            ->needs('App\Domain\Contracts\JurusanInterface')
            ->give('App\Domain\Repositories\JurusanRepository');
         // mendaftarkan formulir 
        $this->app->when('App\Http\Controllers\FormulirController')
            ->needs('App\Domain\Contracts\FormulirInterface')
            ->give('App\Domain\Repositories\FormulirRepository');
         // mendaftarkan biodata 
        $this->app->when('App\Http\Controllers\BiodataController')
            ->needs('App\Domain\Contracts\BiodataInterface')
            ->give('App\Domain\Repositories\BiodataRepository');
         // mendaftarkan pendaftaran 
        $this->app->when('App\Http\Controllers\PendaftaranController')
            ->needs('App\Domain\Contracts\PendaftaranInterface')
            ->give('App\Domain\Repositories\PendaftaranRepository');
         // mendaftarkan user 
        $this->app->when('App\Http\Controllers\UserController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
         // mendaftarkan register
        $this->app->when('App\Http\Controllers\UserdaftarController')
            ->needs('App\Domain\Contracts\UserInterface')
            ->give('App\Domain\Repositories\UserRepository');
    }
}
