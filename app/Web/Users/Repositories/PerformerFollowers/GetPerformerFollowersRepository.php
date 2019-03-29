<?php

namespace App\Web\Users\Repositories\PerformerFollowers;

use App\Models\User;

class GetPerformerFollowersRepository
{
    public function getAllFollowersOfPerformer(User $user)
    {
        return $user->followers();
    }
}