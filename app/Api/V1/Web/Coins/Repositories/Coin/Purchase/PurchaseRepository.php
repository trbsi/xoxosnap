<?php

namespace App\Api\V1\Web\Coins\Repositories\Coin\Purchase;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\CoinTransaction;
use App\Models\Media;
use App\Models\Story;
use App\Web\Coins\Traits\ConvertCoinsTrait;
use DB;
use App\Web\Coins\Events\MediaPurchasedEvent;

class PurchaseRepository 
{
	use ConvertCoinsTrait;

    public function purchase(int $id, string $type): array
    {
        $model = $this->getModel($id, $type);
    	$user = Auth::user();
    	$coinsCost = $this->convertToNaughtyCoins($model->cost);

    	if ($user->coin->current_coins < $coinsCost) {
    		abort(400, __('web/coins/coins.update.no_enough_coins'));
    	}

        //check if user already bought access to media
        if ($model->purchases()->where('user_id', $user->id)->count() > 0) {
            return [
                'coins' => $user->coin->current_coins
            ];
        }

    	//if exception above is not thrown, user does not have access to media, take coins
    	try {
            DB::beginTransaction();
            //set as purchased
            $this->setAsPurchased($model, $user->id);

            //take coins from user
    		$user->coin()->decrement('current_coins', $coinsCost);

            //save transaction
            CoinTransaction::create([
                'sender_id' => $user->id,
                'receiver_id' => $model->user_id,
                'coins' => $coinsCost,
            ]);

            //increment performer's coins
            $model->user->coin()->increment('current_coins', $coinsCost);
            $model->user->coin()->increment('total_coins', $coinsCost);

            //increment number of times media was purchased
            $model->increment('purchased_count');

            event(new MediaPurchasedEvent($user, $model));
            DB::commit();
		} catch (Exception $e) {
            DB::rollBack();
            abort(400, __('web/coins/coins.update.unable_to_take_coins'));
		}

    	return [
    		'coins' => $user->coin->fresh()->current_coins
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
