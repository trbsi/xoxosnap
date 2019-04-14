<?php

namespace App\Web\Notifications\Views\Composers;

use Illuminate\View\View;
use App\Web\Notifications\Repositories\GetNotifications\GetNotificationsRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;
use App\Web\Notifications\Resources\Counts\Repositories\NotificationsCount\NotificationsCountRepository;

class NotificationComposer
{
    private $getNotificationsRepository;
    private $notificationsCountRepository;

	public function __construct(
        GetNotificationsRepository $getNotificationsRepository,
        NotificationsCountRepository $notificationsCountRepository
    ) {
        $this->getNotificationsRepository = $getNotificationsRepository;
        $this->notificationsCountRepository = $notificationsCountRepository;
	}

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (false !== strpos($view->getPath(), 'views/admin')) {
            return;
        }

    	$user = Auth::user();

        $newFollowersNotifications = $newNotifications = [];
        $newFollowersNotificationsCount = $newNotificationsCount = 0;
        $showNewFollowersNotifications = false;

    	if (null !== $user) {
    		if (User::USER_TYPE_PERFORMER === $user->profile_type) {
                $showNewFollowersNotifications = true;

                $newFollowersNotifications = $this->getNotificationsRepository->getNewFollowersNotifications();
                $newFollowersNotificationsCount = $this->notificationsCountRepository->getNewFollowersNotificationsCount();
    		} elseif (User::USER_TYPE_VIEWER === $user->profile_type) {
                $showNewFollowersNotifications = false;
		    }

            $newNotifications = $this->getNotificationsRepository->getNewNotifications(); 
            $newNotificationsCount = $this->notificationsCountRepository->getNewNotificationsCount(); 
    	}

        $view->with('showNewFollowersNotifications', $showNewFollowersNotifications);

        //followers
        $view->with('newFollowersNotifications', $newFollowersNotifications);
        $view->with('newFollowersNotificationsCount', $newFollowersNotificationsCount);

        //notifications
        $view->with('newNotificationsCount', $newNotificationsCount);
        $view->with('newNotifications', $newNotifications);

    }
}