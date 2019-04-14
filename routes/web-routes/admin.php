<?php 

Route::prefix('adultadmin')->group(function () {
    $ctl = '\App\Web\Admin\Auth\Controllers\LoginController';
    Route::get('login', $ctl.'@login')->name('web.admin.login');
});
