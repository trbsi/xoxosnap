<?php

namespace App\Api\V1\Web\Coins\Repositories\Purchase;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\CoinTransaction;
use App\Models\Media;
use App\Models\Story;
use App\Web\Coins\Traits\ConvertToNaughtyCoinsTrait;
use DB;

class PurchaseRepository 
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

        //check if user already bought access to media
        if ($model->purchases()->where('user_id', $user->id)->count() > 0) {
            return [
                'coins' => $user->coin->coins
            ];
        }

    	//if exception above is not thrown, user does not have access to media, take coins
    	try {
            DB::beginTransaction();
            //set as purchased
            $this->setAsPurchased($model, $user->id);

            //take coins from user
    		$user->coin()->decrement('coins', $coinsCost);

            //save transaction
            CoinTransaction::create([
                'sender_id' => $user->id,
                'receiver_id' => $model->user_id,
                'coins' => $coinsCost,
            ]);

            //increment performer's coins
            $model->user->coin()->increment('coins', $coinsCost);
            DB::commit();
		} catch (Exception $e) {
            DB::rollBack();
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
