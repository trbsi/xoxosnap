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
    	$user = Auth::user();

        $newFollowersNotifications = $newNotifications = [];
        $newFollowersNotificationsCount = $newNotificationsCount = 0;
        $showNewFollowersNotifications = false;

    	if (null !== $user) {
    		if (User::USER_TYPE_PERFORMER === $user->profile_type) {
                $showNewFollowersNotifications = true;

                $newFollowersNotifications = $this->getNotificationsRepository->getNewFollowersNotifications();
                $newNotifications = $this->getNotificationsRepository->getNewPurchasesNotifications();         

                $newFollowersNotificationsCount = $this->notificationsCountRepository->getNewFollowersNotificationsCount();
                $newNotificationsCount = $this->notificationsCountRepository->getNewPurchasesNotificationsCount();         
    		} elseif (User::USER_TYPE_VIEWER === $user->profile_type) {
                $showNewFollowersNotifications = false;

                $newNotifications = $this->getNotificationsRepository->getPerformerPostedNotifications(); 
                $newNotificationsCount = $this->notificationsCountRepository->getPerformerPostedNotificationsCount(); 
		    }
    	}

        $view->with('showNewFollowersNotifications', $showNewFollowersNotifications);

        //notifications content
        $view->with('newFollowersNotifications', $newFollowersNotifications);
        $view->with('newNotifications', $newNotifications);

        //notifications count
        $view->with('newFollowersNotificationsCount', $newFollowersNotificationsCount);
        $view->with('newNotificationsCount', $newNotificationsCount);
    }
}