<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Web\Users\Listeners\CreateCoinsListener;
use App\Web\Notifications\Resources\Counts\Listeners\NotificationsCountListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            CreateCoinsListener::class,
            NotificationsCountListener::class,
        ],
        'App\Web\Coins\Events\MediaPurchasedEvent' => [
            'App\Web\Coins\Listeners\MediaPurchasedListener'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
