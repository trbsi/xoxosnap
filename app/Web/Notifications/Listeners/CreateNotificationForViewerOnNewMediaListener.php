<?php

namespace App\Web\Notifications\Listeners;

use App\Models\Notification;
use App\Models\NotificationCount;
use App\Web\Media\Events\PerformerAddedNewMediaEvent;
use App\Web\Users\Repositories\PerformerFollowers\GetPerformerFollowersRepository;
use DB;

class CreateNotificationForViewerOnNewMediaListener
{
    private $getPerformerFollowersRepository;

    public function __construct(GetPerformerFollowersRepository $getPerformerFollowersRepository)
    {
        $this->getPerformerFollowersRepository = $getPerformerFollowersRepository;
    }

    public function handle(PerformerAddedNewMediaEvent $event)
    {
        $followersIds = $this->getPerformerFollowersRepository->getAllFollowersOfPerformer($event->performer);
        $followersIds = $followersIds->pluck('users.id');

        foreach ($followersIds as $followerId) {
            //save to notifications
            Notification::create([
                'user_id' => $followerId,
                'notification_type' => Notification::TYPE_VIEWER_PERFORMER_POSTED,
                'by_user_id' => $event->performer->id,
            ]);
        }

        NotificationCount::whereIn('user_id', $followersIds)
            ->update([
                'new_notifications' => DB::raw('new_notifications + 1'),
            ]);
    }

}