<?php

namespace App\Web\Repositories\PerformerFollowers;

use App\Models\User;

class GetPerformerFollowersRepository
{
    public function getAllFollowersOfPerformer(User $user)
    {
        return $user->followers();
    }
}