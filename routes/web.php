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
	//Route::get('/redirect', 'SocialAuthController@redirect');
//	Route::get('auth/facebook', 'SocialAuthController@redirect');
	//Route::get('auth/facebook/callback', 'SocialAuthController@callback');
	
	Route::get('auth/{provider}', 'SocialAuthController@redirect');
	Route::get('auth/{provider}/callback', 'SocialAuthController@callback');
	Auth::routes();

Route::get('/home', 'HomeController@index');
