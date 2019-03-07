<?php

namespace App\Api\V1\Web\Users\Repositories\FollowUser;

use Exception;
use Illuminate\Support\Facades\Auth;

class FollowUserRepository 
{
    public function follow(int $userId): array
    {
    	$user = Auth::user();

    	try {
    		$user->follows()->attach($userId);
    		$followed = true;
    	} catch (Exception $e) {
    		$user->follows()->detach($userId);
    		$followed = false;
    	}
        return ['followed' => $followed];
    }
}
