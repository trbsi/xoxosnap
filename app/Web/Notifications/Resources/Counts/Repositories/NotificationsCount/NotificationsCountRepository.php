<?php

namespace App\Web\Notifications\Resources\Counts\Repositories\NotificationsCount;

use App\Models\NotificationCount;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationsCountRepository
{
   public function getNotificationsCount(): NotificationCount   
    {    	
		return NotificationCount::where('user_id', Auth::id())->first();
    }

    public function getNewFollowersNotificationsCount()
    {
    	return $this->getNotificationsCount()->new_followers;
    }

    public function getNewNotificationsCount()
    {
    	return $this->getNotificationsCount()->new_notifications;
    }
}