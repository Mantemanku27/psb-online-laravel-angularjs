<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
|                               API Routes
|--------------------------------------------------------------------------
|
|  Di gunakan untuk mendaftarkan rute API,
|  dan rute di muat oleh RouteServiceProvider.
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Rute API tabel Biodata
Route::resource('biodatas', 'BiodataController');
Route::get('batas-input-biodatas', 'BiodataController@batasInputBiodata');
Route::get('getidbiodatas', 'BiodataController@cekidbiodata');

// Rute API tabel Formulir
Route::resource('formulirs', 'FormulirController');
Route::get('get-formulirs-by-id/{id}', 'FormulirController@paginatebyid');
Route::get('batas-input-formulir/{id}', 'FormulirController@batasInputformulir');
Route::get('cek-id-formulir', 'FormulirController@cekidformulir');

// Rute API tabel Jurusan
Route::resource('jurusans', 'JurusanController');
Route::get('getList-jurusan', 'JurusanController@getList');
Route::get('getList-jurusan-by-pendaftran/{id}', 'JurusanController@getListjursanbypendaftaran');

// Rute API tabel Pendaftaran
Route::resource('pendaftarans', 'PendaftaranController');
Route::get('batas-input-pendaftarans/{id}', 'PendaftaranController@batasInputPendaftaran');
Route::get('get-pendaftarans-by-id/{id}', 'PendaftaranController@paginatebyid');

// Rute API tabel User
Route::resource('users', 'UserController');

// Rute API tabel Post Pemberitahuan
Route::resource('posts', 'PostController');

// Rute API tabel Panitia
Route::resource('panitias', 'PanitiaController');

// Rute API Register
Route::post('post-signup', 'UserdaftarController@createsiswa');

// Rute API login
Route::group(['namespace' => 'Auth'], function () {
    Route::get('get-login', 'LoginController@getLogin');
    Route::get('logout', 'LoginController@getLogout');
    Route::get('post-login', 'LoginController@getLogin');
    Route::post('post-login', 'LoginController@postLogin');
});
Route::get('get-session', 'UserController@getSession');

// Rute API Ganti Password
Route::put('updatePass-users', 'UserController@updatePass');
