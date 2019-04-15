<?php

Route::prefix('adultadmin')->group(function () {
    $ctl = '\App\Web\Admin\Auth\Controllers\AuthController';
    Route::get('login', $ctl . '@login')->name('web.admin.login');
    Route::post('submit-login', $ctl . '@submitLogin')->name('web.admin.submit-login');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        $ctl = '\App\Web\Admin\Auth\Controllers\AuthController';
        Route::post('logout', $ctl . '@logout')->name('web.admin.logout');

        Route::prefix('users')->group(function () {
            $ctl = '\App\Web\Admin\Users\Controllers\UserController';
            Route::get('', $ctl . '@get')->name('web.admin.user.get');

            Route::prefix('verifications')->group(function () {
                $ctl = '\App\Web\Admin\Users\Resources\Verifications\Controllers\VerificationController';
                Route::post('change-verification-status', $ctl . '@changeVerificationStatus')->name('web.admin.user.verification.change-verification-status');
            });

        });
    });
});