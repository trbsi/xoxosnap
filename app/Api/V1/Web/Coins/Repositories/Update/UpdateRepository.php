<?php

namespace App\Api\V1\Web\Coins\Repositories\Update;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Media;
use App\Web\Coins\Traits\ConvertToNaughtyCoinsTrait;

class UpdateRepository 
{
	use ConvertToNaughtyCoinsTrait;

    public function update(int $id): array
    {
    	$media = Media::find($id);
    	$user = Auth::user();
    	$coinsCost = $this->convertToNaughtyCoins($media->cost);

    	if ($user->coin->coins < $coinsCost) {
    		abort(400, __('web/coins/coins.update.no_enough_coins'));
    	}

    	try {
    		//check if user already bought access to video
    		//if exception is thrown then he already has access
    		$media->purchases()->attach($user->id);
    	} catch (Exception $e) {
    		return [
	    		'coins' => $user->coin->coins
	    	];
    	}

    	//if exception above is not thrown, use does not have access, take coins
    	try {
    		$user->coin()->decrement('coins', $coinsCost);
		} catch (Exception $e) {
			abort(400, __('web/coins/coins.update.unable_to_take_coins'));
		}

    	return [
    		'coins' => $user->coin->coins
    	];
    }
}
