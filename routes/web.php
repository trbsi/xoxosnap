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


//public
Route::get('/', '\App\Web\Home\Controllers\HomeController@index')->name('home');
Route::get('/explore', '\App\Web\Home\Controllers\HomeController@explore')->name('explore');

//user profile
Route::prefix('u')->group(function () {
	$ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
	Route::get('{username}', $ctl.'@profile')->name('user.profile');
	Route::get('{username}/about', $ctl.'@about')->name('user.about');
});


//auth
Auth::routes();
Route::namespace('Auth')->group(function () {
	Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
	Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect')->name('social.login');
});
