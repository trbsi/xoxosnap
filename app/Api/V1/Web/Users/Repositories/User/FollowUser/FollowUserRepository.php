<?php

namespace App\Api\V1\Web\Users\Repositories\User\FollowUser;

use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class FollowUserRepository 
{
    public function follow(int $userId): array
    {
    	$user = Auth::user();
        $follows = $user->follows();

        $followedUser = User::find($userId);
        $followedUserProfile = $followedUser->profile;
        $followedUserProfile->noMutation = true;

    	try {
    		$follows->attach($userId);
            $followedUserProfile->increment('followers');
    		$followed = true;
    	} catch (Exception $e) {
    		$follows->detach($userId);
            $followedUserProfile->decrement('followers');
    		$followed = false;
    	}
        return ['followed' => $followed];
    }
}
