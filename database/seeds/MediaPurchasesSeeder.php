<?php

use App\Models\CoreUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\User;

class MediaPurchasesSeeder extends Seeder
{
	public function run(Media $media, User $user)
    {
    	$media = $media->limit(25)->get();
    	$viewers = $user->where('profile_type', User::USER_TYPE_VIEWER)->get();

    	foreach ($media as $singleMedia) {
    		foreach ($viewers as $viewer) {
	    		$singleMedia->purchases()->attach($viewer->id);
    		}
    	}
    }
}