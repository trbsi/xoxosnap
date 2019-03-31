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
Route::get('/', '\App\Web\Home\Controllers\HomeController@home')->name('web.home');
Route::get('/explore', '\App\Web\Home\Controllers\HomeController@explore')->name('web.explore');
Route::get('/terms-of-use', '\App\Web\Home\Controllers\LegalController@termsOfUse')->name('web.terms-of-use');
Route::get('/privacy-policy', '\App\Web\Home\Controllers\LegalController@privacyPolicy')->name('web.privacy-policy');
Route::get('/search', '\App\Web\Search\Controllers\SearchController@search')->name('web.search');

//user profile
Route::prefix('u')->group(function () {
	$ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
	Route::get('{username}', $ctl.'@profile')->name('web.user.profile');
	Route::get('{username}/about', $ctl.'@about')->name('web.user.about');
	Route::get('{username}/{slug}', $ctl.'@userSingleVideo')->name('web.user.single-video');
});

//register/login
Auth::routes();
Route::namespace('Auth')->group(function () {
	//social login
	Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
	Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect')->name('web.social.login');
});

//*********************AUTH ROUTES*********************
Route::middleware('auth')->group(function () {
	Route::prefix('coins')->group(function () {
		$ctl = '\App\Web\Coins\Controllers\CoinController';
        Route::get('buy-coins', $ctl.'@showBuyCoinsForm')->name('web.coins.show-buy-coins-form');
        Route::post('process-coins-order', $ctl.'@processCoinsOrder')->name('api.coins.process-coins-order');
	});

	Route::prefix('media')->group(function () {
		$ctl = '\App\Web\Media\Controllers\MediaController';
		Route::post('delete', $ctl.'@delete')->name('web.media.delete');
		Route::post('update', $ctl.'@update')->name('web.media.update');
	});

	Route::prefix('users')->group(function () {
		Route::prefix('profiles')->group(function () {
			Route::prefix('settings')->group(function () {
				$ctl = '\App\Web\Users\Resources\Profiles\Controllers\SettingsController';
				Route::get('account', $ctl.'@accountSettings')->name('web.user.profile.settings.account-settings');
				Route::post('edit-account', $ctl.'@editAccountSettings')->name('web.user.profile.settings.edit-account-settings');

				Route::get('personal-info', $ctl.'@personalInfoSettings')->name('web.user.profile.settings.personal-info-settings');
				Route::post('edit-personal-info', $ctl.'@editPersonalInfoSettings')->name('web.user.profile.settings.edit-personal-info-settings');

				Route::get('change-password', $ctl.'@changePasswordSettings')->name('web.user.profile.settings.change-password-settings');
				Route::post('edit-change-password', $ctl.'@editChangePasswordSettings')->name('web.user.profile.settings.edit-change-password-settings');
			});
		});

		Route::prefix('verifications')->group(function () {
			$ctl = '\App\Web\Users\Resources\Verifications\Controllers\VerificationController';
			Route::post('request-verification', $ctl.'@requestVerification')->name('web.user.verification.request-verification');
		});
	});
});