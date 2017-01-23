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

Route::group(['namespace' => 'Admin','middleware'=>'auth'], function () {
	Route::resource('roles', 'RolesController', ['except' => ['show']]);
	Route::resource('users', 'UsersController', ['except' => ['show']]);
});

Auth::routes();

Route::get('/me', 'HomeController@me');
Route::get('/', 'HomeController@index');
