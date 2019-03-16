<?php

namespace App\Api\V1\Web\Notifications\Repositories\Notification\MarkAllAsRead;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class MarkAllAsReadRepository
{
	public function markAllAsRead(?int $type): void
	{
		$user = Auth::user();

		//this is seperate notification box on frontend, update only those notifications
		if (Notification::TYPE_PERFORMER_NEW_FOLLOWER === $type) {
			Notification::where('notification_type', $type)
			->where('user_id', Auth::id())
			->update(['is_read' => 1]);

			$user->notificationCount()->update(['new_followers' => 0]);
		} else {
			//update all notifications of this user, except for "new followers" notifications
			Notification::where('notification_type', '!=', Notification::TYPE_PERFORMER_NEW_FOLLOWER)
			->where('user_id', Auth::id())
			->update(['is_read' => 1]);

			$user->notificationCount()->update(['new_notifications' => 0]);
		}
	}
}
