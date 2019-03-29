<?php

namespace App\Providers;

use App\Web\Media\Events\PerformerAddedNewMediaEvent;
use App\Web\Notifications\Listeners\CreateNotificationForPerformerOnNewFollowerListener;
use App\Web\Notifications\Listeners\CreateNotificationForViewerOnNewMediaListener;
use App\Web\Users\Events\ViewerFollowedPerformerEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Web\Users\Listeners\CreateCoinsListener;
use App\Web\Notifications\Resources\Counts\Listeners\NotificationsCountListener;
use App\Web\Coins\Events\MediaPurchasedEvent;
use App\Web\Coins\Listeners\CreateNotificationForPerformerListener;
use App\Web\Users\Resources\Verifications\Listeners\CreateVerificationNumberListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->listen = [
            Registered::class => [
                SendEmailVerificationNotification::class,
                CreateCoinsListener::class,
                NotificationsCountListener::class,
                CreateVerificationNumberListener::class,
            ],
            MediaPurchasedEvent::class => [
                CreateNotificationForPerformerListener::class
            ],
            ViewerFollowedPerformerEvent::class => [
                CreateNotificationForPerformerOnNewFollowerListener::class,
            ],
            PerformerAddedNewMediaEvent::class => [
                CreateNotificationForViewerOnNewMediaListener::class,
            ],
        ];

        parent::boot();
    }
}
