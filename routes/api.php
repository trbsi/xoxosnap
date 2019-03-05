<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function () {
	Route::prefix('v1')->group(function () {
		Route::prefix('media')->group(function () {
			$ctl = '\App\Api\V1\Web\Media\Controllers\MediaController';
			Route::post('update-views', $ctl.'@updateViews')->name('media.update-views');
			Route::post('like', $ctl.'@like')->name('media.like');
		});
		Route::prefix('coins')->group(function () {
			$ctl = '\App\Api\V1\Web\Coins\Controllers\CoinController';
			Route::patch('', $ctl.'@update')->name('coins.patch');
		});
	});
});
