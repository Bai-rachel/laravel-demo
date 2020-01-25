<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', ['uses' => 'AuthController@login'])->name("login");
Route::post('submit-login', ['uses' => 'AuthController@submitLogin'])->name("submit-Login");
Route::group([ 'prefix' => '/', 'middleware' => ['web', 'admin'] ], function () {

	Route::get('/index', function () {
	return view('index');
	});

	Route::get('user/add', ['uses' => 'UserController@add'])->name("user.add");
	Route::get('user/edit/{id}', ['uses' => 'UserController@edit'])->name("user.edit");
	Route::post('user/save/{id}', ['uses' => 'UserController@save'])->name("user.save");
	Route::get('user/list', ['uses' => 'UserController@list'])->name("user.list");

	
});
