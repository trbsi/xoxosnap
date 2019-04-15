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
            Route::post('update-views', $ctl . '@updateViews')->name('api.media.update-views');
            Route::post('like', $ctl . '@like')->name('api.media.like');
            Route::post('', $ctl . '@create')->name('api.media.create');
            Route::get('', $ctl . '@one')->name('api.media.one');
        });

        Route::prefix('stories')->group(function () {
            $ctl = '\App\Api\V1\Web\Stories\Controllers\StoryController';
            Route::post('', $ctl . '@create')->name('api.story.create');
        });

        Route::prefix('coins')->group(function () {
            $ctl = '\App\Api\V1\Web\Coins\Controllers\CoinController';
            Route::patch('purchase-media', $ctl . '@purchaseMedia')->name('api.coins.purchase-media');
        });

        Route::prefix('users')->group(function () {
            $ctl = '\App\Api\V1\Web\Users\Controllers\UserController';
            Route::post('follow-user', $ctl . '@followUser')->name('api.users.follow-user');
        });

        Route::prefix('notifications')->group(function () {
            $ctl = '\App\Api\V1\Web\Notifications\Controllers\NotificationController';
            Route::get('', $ctl . '@get')->name('api.notifications.get');
            Route::post('', $ctl . '@markAllAsRead')->name('api.notifications.mark-all-as-read');
        });
    });
});


//*******************PUBLIC************************
Route::prefix('v1')->group(function () {
    Route::prefix('stories')->group(function () {
        $ctl = '\App\Api\V1\Web\Stories\Controllers\StoryController';
        Route::post('update-views', $ctl . '@updateViews')->name('api.story.update-views');
    });

    Route::prefix('hashtags')->group(function () {
        $ctl = '\App\Api\V1\Web\Hashtags\Controllers\HashtagController';
        Route::get('/filter', $ctl . '@filter')->name('api.hashtags.filter'); //public because of jquery token input plugin can't handle laravel_token
    });

    Route::prefix('coins')->group(function () {
        $ctl = '\App\Api\V1\Web\Coins\Controllers\CoinController';
        Route::post('payment-gateway-callback', $ctl . '@paymentGatewayCallback')->name('api.payment-gateway-callback');
    });
});