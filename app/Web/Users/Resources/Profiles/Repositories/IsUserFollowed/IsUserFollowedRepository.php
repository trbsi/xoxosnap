<?php

namespace App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed;

use App\Models\User;

class IsUserFollowedRepository
{
    public function isUserFollowed(int $userId, ?User $authUser): bool
    {
        if (null === $authUser) {
            return false;
        }

        return $authUser->follows()->where('followers.user_id', $userId)->exists();
    }
}
