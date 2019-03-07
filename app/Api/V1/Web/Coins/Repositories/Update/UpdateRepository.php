<?php

namespace App\Api\V1\Web\Coins\Repositories\Update;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Media;
use App\Models\Story;
use App\Web\Coins\Traits\ConvertToNaughtyCoinsTrait;

class UpdateRepository 
{
	use ConvertToNaughtyCoinsTrait;

    public function purchase(int $id, string $type): array
    {
        $model = $this->getModel($id, $type);
    	$user = Auth::user();
    	$coinsCost = $this->convertToNaughtyCoins($model->cost);

    	if ($user->coin->coins < $coinsCost) {
    		abort(400, __('web/coins/coins.update.no_enough_coins'));
    	}

    	try {
    		//check if user already bought access to media
    		//if exception is thrown then he already has access
            $this->setAsPurchased($model, $user->id);
    	} catch (Exception $e) {
    		return [
                'e' =>$e->getMessage(),
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

    private function getModel(int $id, string $type)
    {
        switch ($type) {
            case 'video':
                return Media::find($id);
            case 'story':
                return Story::find($id);
        }
    }

    private function setAsPurchased($model, int $userId) 
    {
        $model->purchases()->attach($userId);
    }
}
