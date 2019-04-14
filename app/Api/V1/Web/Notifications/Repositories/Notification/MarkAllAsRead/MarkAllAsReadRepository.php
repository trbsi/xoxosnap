<?php

namespace App\Api\V1\Web\Notifications\Repositories\Notification\MarkAllAsRead;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class MarkAllAsReadRepository
{
    private $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function markAllAsRead(?int $type): void
    {
        $user = Auth::user();

        //this is seperate notification box on frontend, update only those notifications
        if (Notification::TYPE_PERFORMER_NEW_FOLLOWER === $type) {
            $this->notification = $this->notification->where('notification_type', $type);

            $user->notificationCount()->update(['new_followers' => 0]);
        } else {
            //update all notifications of this user, except for "new followers" notifications
            $this->notification = $this->notification->where('notification_type', '!=', Notification::TYPE_PERFORMER_NEW_FOLLOWER);
            $user->notificationCount()->update(['new_notifications' => 0]);
        }

        $this->notification = $this->notification
            ->where('user_id', $user->id)
            ->update(['is_read' => 1]);
    }
}
