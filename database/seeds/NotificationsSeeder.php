<?php

use App\Models\CoreUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Notification;

class NotificationsSeeder extends Seeder
{
    public function run(User $user)
    {    	
    	$performers = $user->where('profile_type', User::USER_TYPE_PERFORMER)->get();
    	$viewers = $user->where('profile_type', User::USER_TYPE_VIEWER)->get();

        $this->seedForPerformers($performers, $viewers);
        $this->seedForViewers($performers, $viewers);
    }

    private function seedForPerformers($performers, $viewers) 
    {
    	//for each performer add 10 notifications of viewers
    	foreach ($performers as $performer) {
    		for ($i = 0; $i < 10; $i++) {
	    		$dataFollowers[] = [
					'notification_type' => Notification::TYPE_PERFORMER_NEW_FOLLOWER,
					'by_user_id' => $viewers[$i]->id,
	    		];
    		}

    		for ($i = 0; $i < 10; $i++) {
	    		$dataPurchases[] = [
					'notification_type' => Notification::TYPE_PERFORMER_NEW_PURCHASE,
					'by_user_id' => $viewers[$i]->id,
	    		];
    		}
    	}

		$performer->notifications()->createMany($dataFollowers);
		$performer->notifications()->createMany($dataPurchases);
    }

    private function seedForViewers($performers, $viewers) 
    {
    	//for each viewer add 10 notifications of performer
    	foreach ($viewers as $viewer) {
    		for ($i = 0; $i < 10; $i++) {
	    		$dataPerformerPosted[] = [
					'notification_type' => Notification::TYPE_VIEWER_PERFORMER_POSTED,
					'by_user_id' => $performers[$i]->id,
	    		];
    		}
    	}

		$viewer->notifications()->createMany($dataPerformerPosted);
    }
}
