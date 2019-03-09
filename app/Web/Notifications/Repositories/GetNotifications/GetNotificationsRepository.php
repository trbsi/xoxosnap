<?php

namespace App\Web\Notifications\Repositories\GetNotifications;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Pagination\LengthAwarePaginator;

class GetNotificationsRepository 
{
   public function getNotifications(?int $type = null): LengthAwarePaginator
    {
		$notifications =
    		Notification::where('user_id', Auth::id())
    		->with(['byUser.profile'])
    		->orderBy('id', 'DESC')
   			;
        if (null !== $type) {
            $notifications = $notifications->where('notification_type', $type);
        }

        return $notifications->paginate(6);
    }

    public function getNewFollowersNotifications()
    {
    	return $this->getNotifications(Notification::TYPE_PERFORMER_NEW_FOLLOWER);
    }

    public function getNewNotifications()
    {
    	return $this->getNotifications();
    }
}
