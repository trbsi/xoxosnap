<?php

namespace App\Api\V1\Web\Users\Repositories\User\FollowUser;

use App\Web\Users\Events\ViewerFollowedPerformerEvent;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class FollowUserRepository
{
    public function follow(int $userId): array
    {
        $followedBy = Auth::user();
        $follows = $followedBy->follows();

        $followedUser = User::find($userId);
        $followedUserProfile = $followedUser->profile;
        $followedUserProfile->noMutation = true;

        try {
            $follows->attach($userId);
            $followedUserProfile->increment('followers');
            $followed = true;
            event(new ViewerFollowedPerformerEvent($followedUser, $followedBy));
        } catch (Exception $e) {
            $follows->detach($userId);
            $followedUserProfile->decrement('followers');
            $followed = false;
        }
        return ['followed' => $followed];
    }
}
