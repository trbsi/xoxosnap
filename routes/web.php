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



Route::prefix('u')->group(function () {
	$ctl = '\App\Web\Users\Resources\Profiles\Controllers\ProfileController';
	Route::get('{username}', $ctl.'@profile')->name('user.profile');
	Route::get('{username}/about', $ctl.'@about')->name('user.about');
});
