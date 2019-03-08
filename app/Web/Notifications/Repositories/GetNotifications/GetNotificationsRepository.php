<?php

namespace App\Web\Notifications\Repositories\GetNotifications;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Pagination\LengthAwarePaginator;

class GetNotificationsRepository 
{
   public function getNotifications(int $type): LengthAwarePaginator
    {
		return
    		Notification::where('notification_type', $type)
    		->where('user_id', Auth::id())
    		->with(['byUser.profile'])
    		->orderBy('id', 'DESC')
   			->paginate(10);
    }

    public function getNewFollowersNotifications()
    {
    	return $this->getNotifications(Notification::TYPE_PERFORMER_NEW_FOLLOWER);
    }

    public function getNewPurchasesNotifications()
    {
    	return $this->getNotifications(Notification::TYPE_PERFORMER_NEW_PURCHASE);
    }

    public function getPerformerPostedNotifications()
    {
    	return $this->getNotifications(Notification::TYPE_VIEWER_PERFORMER_POSTED);
    }
}
