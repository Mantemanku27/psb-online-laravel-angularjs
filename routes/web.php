<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'page', 'uses' => 'PageController@landingpage']);
Route::get('/landingpage', ['as' => 'token', 'uses' => 'PageController@landingpage']);
Route::get('/signup', ['as' => 'signup', 'uses' => 'PageController@signup']);
Route::get('/login', ['as' => 'login', 'uses' => 'PageController@getLogin']);
Route::get('/pendaftaran', ['as' => 'pendaftaran', 'uses' => 'PageController@pendaftaran']);
Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
