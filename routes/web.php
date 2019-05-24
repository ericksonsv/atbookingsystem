<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/{any}', 'backend.layouts.app')->where('any', '.*');

Route::prefix('backend')->namespace('Backend')->group(function(){
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('backend.login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('backend.logout');
	Route::get('/','DashboardController@index')->name('backend.dashboard');
	Route::get('users/deleted','UserController@deleted')->name('backend.users.deleted');
	Route::resource('users','UserController', ['names' => 'backend.users']);
	Route::post('users/restore/{id}','UserController@restore')->name('backend.users.restore');
	Route::post('users/remove/{id}','UserController@remove')->name('backend.users.remove');
});
