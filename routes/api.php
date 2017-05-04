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

Route::resource('posts','PostController');
Route::resource('jurusans','JurusanController');
Route::resource('formulirs','FormulirController');
Route::resource('biodatas','BiodataController');
Route::get('batas-input-biodatas','BiodataController@batasInputBiodata');
Route::resource('pendaftarans','PendaftaranController');
Route::resource('users','UserController');

Route::group(['namespace' => 'Auth'], function () {
    // Rute otentikasi
    Route::get('get-login', 'LoginController@getLogin');
    Route::get('logout', 'LoginController@getLogout');
    Route::get('post-login', 'LoginController@getLogin');
    Route::post('post-login', 'LoginController@postLogin');
});

Route::get('get-session', 'UserController@getSession');
Route::get('getList-jurusan','JurusanController@getList');
