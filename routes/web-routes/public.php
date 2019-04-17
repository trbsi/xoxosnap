<?php
//*********************PUBLIC ROUTES*********************

Route::middleware(['role:user,guest'])->group(function () {
    Route::get('/', '\App\Web\Home\Controllers\HomeController@home')->name('web.home');
    Route::get('/explore', '\App\Web\Home\Controllers\HomeController@explore')->name('web.explore');
    Route::get('/terms-of-use', '\App\Web\Home\Controllers\LegalController@termsOfUse')->name('web.terms-of-use');
    Route::get('/privacy-policy', '\App\Web\Home\Controllers\LegalController@privacyPolicy')->name('web.privacy-policy');
    Route::get('/search', '\App\Web\Search\Controllers\SearchController@search')->name('web.search');

//user profile
    Route::prefix('u')->group(function () {
        $ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
        Route::get('{username}', $ctl . '@profile')->name('web.user.profile');
        Route::get('{username}/about', $ctl . '@about')->name('web.user.about');
        Route::get('{username}/{slug}', $ctl . '@userSingleVideo')->name('web.user.single-video');
    });

//register/login
    Auth::routes();
    Route::namespace('Auth')->group(function () {
        //social login
        Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
        Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect')->name('web.social.login');
    });
});
