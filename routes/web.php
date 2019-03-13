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


//*********************PUBLIC ROUTES*********************
Route::get('/', '\App\Web\Home\Controllers\HomeController@home')->name('home');
Route::get('/explore', '\App\Web\Home\Controllers\HomeController@explore')->name('explore');
Route::get('/terms-of-use', '\App\Web\Home\Controllers\LegalController@termsOfUse')->name('terms-of-use');
Route::get('/privacy-policy', '\App\Web\Home\Controllers\LegalController@privacyPolicy')->name('privacy-policy');
Route::get('/search', '\App\Web\Search\Controllers\SearchController@search')->name('search');

//user profile
Route::prefix('u')->group(function () {
	$ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
	Route::get('{username}', $ctl.'@profile')->name('user.profile');
	Route::get('{username}/about', $ctl.'@about')->name('user.about');
});


//register/login
Auth::routes();
Route::namespace('Auth')->group(function () {
	//social login
	Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
	Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect')->name('social.login');
});

//*********************AUTH ROUTES*********************
Route::middleware('auth')->group(function () {
	Route::prefix('coins')->group(function () {
		$ctl = '\App\Web\Coins\Controllers\CoinController';
		Route::get('', $ctl.'@get')->name('coins.get');
	});

	Route::prefix('users')->group(function () {
		Route::prefix('profiles')->group(function () {
			$ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
			Route::get('edit-profile', $ctl.'@editProfile')->name('user.profile.edit-profile');
		});
	});
});