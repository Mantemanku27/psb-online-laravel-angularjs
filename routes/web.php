<?php

/*
|--------------------------------------------------------------------------
| Rute Web.
|--------------------------------------------------------------------------
|
| File ini adalah tempat Anda dapat menentukan semua rute yang ditangani.
| Dengan aplikasi anda, Katakan saja kepada Laravel bahwa URI seharusnya merespon
| Untuk menggunakan metode Closure atau controller. Bangun sesuatu yang hebat!
|
*/

// Landing Page
Route::get('/', ['as' => 'page', 'uses' => 'PageController@landingpage']);
Route::get('/landingpage', ['as' => 'token', 'uses' => 'PageController@landingpage']);
// Sign Up
Route::get('/signup', ['as' => 'signup', 'uses' => 'PageController@signup']);
// Konfirmasi Email
Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'PageController@confirm']);
// login
Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
Route::get('/login', ['as' => 'login', 'uses' => 'PageController@getLogin']);
// Dashboard
Route::get('/pendaftaran', ['as' => 'pendaftaran', 'uses' => 'PageController@pendaftaran']);
// Console.log
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
