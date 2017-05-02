<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('posts','PostController');
Route::resource('jurusans','JurusanController');
Route::resource('formulirs','FormulirController');
Route::resource('biodatas','BiodataController');
Route::resource('pendaftarans','PendaftaranController');
Route::resource('users','UserController');

////auth
Route::group(['namespace' => 'Auth'], function () {

    // Authentication routes...
    Route::get('get-login', 'LoginController@getLogin');
    Route::get('logout', 'LoginController@getLogout');
    Route::get('post-login', 'LoginController@getLogin');
    Route::post('post-login', 'LoginController@postLogin');
});

Route::get('get-session', 'UserController@getSession');