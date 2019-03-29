<?php

namespace App\Web\Notifications\Listeners;

use App\Models\Notification;
use App\Web\Users\Events\ViewerFollowedPerformerEvent;

class CreateNotificationForPerformerOnNewFollowerListener
{
    public function handle(ViewerFollowedPerformerEvent $event)
    {
        //save to notifications
        Notification::create([
            'user_id' => $event->followedUser->id,
            'notification_type' => Notification::TYPE_PERFORMER_NEW_FOLLOWER,
            'by_user_id' => $event->followedBy->id,
        ]);

        //increment user's notification
        $event->followedUser->notificationCount()->increment('new_followers');
    }
}