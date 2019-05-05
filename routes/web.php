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
});
