<?php

namespace App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed;

use App\Models\User;

class IsUserFollowedRepository
{
    public function isUserFollowed(User $authUser, int $userId): bool
    {
    	return $authUser->follows()->where('followers.user_id', $userId)->exists();
    }
}
