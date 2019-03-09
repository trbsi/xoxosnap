<?php

namespace App\Web\Notifications\Resources\Counts\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\NotificationCount;

class NotificationsCountListener
{
    public function handle(Registered $event)
    {
        $event->user->notificationCount()->create();
    }
}
