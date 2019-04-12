<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class FollowersSeeder extends Seeder
{
    public function run(User $user)
    {
        if ('production' === env('APP_ENV')) {
            return;
        }
        
    	$singleUser = $user->where('username', 'john')->first();
    	$singleUser->follows()->attach($this->getUserIds($user));

    	$singleUser = $user->where('username', 'will')->first();
    	$singleUser->follows()->attach($this->getUserIds($user, 5));
        
    }

    private function getUserIds(User $user, $howMany = 'all')
    {
        $performers = $user->where('profile_type', User::USER_TYPE_PERFORMER)->get();
    	if ('all' === $howMany) {
    		return $performers->pluck('id');
    	}

    	$ids = [];
        $i = 1;
    	foreach ($performers as $performer) {
            if ($i > $howMany) {
                break;
            }
    		$ids[] = $performer->id;
            $i++;
    	}

    	return $ids;
    }
}
