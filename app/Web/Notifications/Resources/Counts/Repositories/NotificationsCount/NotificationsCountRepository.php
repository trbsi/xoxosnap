<?php

namespace App\Web\Notifications\Resources\Counts\Repositories\NotificationsCount;

use App\Models\NotificationCount;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationsCountRepository
{
   public function getNotificationsCount(int $type): NotificationCount   
    {    	
		return NotificationCount::where('user_id', Auth::id())->first();
    }

    public function getNewFollowersNotificationsCount()
    {
    	return $this->getNotificationsCount(Notification::TYPE_PERFORMER_NEW_FOLLOWER)->new_followers;
    }

    public function getNewPurchasesNotificationsCount()
    {
    	return $this->getNotificationsCount(Notification::TYPE_PERFORMER_NEW_PURCHASE)->new_purchases;
    }

    public function getPerformerPostedNotificationsCount()
    {
    	return $this->getNotificationsCount(Notification::TYPE_VIEWER_PERFORMER_POSTED)->performer_posted;
    }
}