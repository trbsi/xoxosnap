<?php

namespace App\Web\Coins\Listeners;

use App\Web\Coins\Events\MediaPurchasedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Notification;

class CreateNotificationForPerformerListener
{
    /**
     * Handle the event.
     *
     * @param  MediaPurchasedEvent  $event
     * @return void
     */
    public function handle(MediaPurchasedEvent $event)
    {
        //save to notifications
        Notification::create([
            'user_id' => $event->model->user_id,
            'notification_type' => Notification::TYPE_PERFORMER_NEW_PURCHASE,
            'by_user_id' => $event->authenticatedUser->id,
        ]);

        //increment user's notification
        $event->model->user->notificationCount()->increment('new_notifications');
    }
}
