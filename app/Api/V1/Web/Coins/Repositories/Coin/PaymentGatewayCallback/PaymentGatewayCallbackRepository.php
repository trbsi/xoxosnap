<?php

namespace App\Api\V1\Web\Coins\Repositories\Coin\PaymentGatewayCallback;

use App\Models\Coin;
use App\Models\CoinTransaction;
use App\Models\User;

class PaymentGatewayCallbackRepository
{
    public function processCallback(array $data)
    {
        /** @var User $user */
        $user = User::where('id', $data['user_id'])->firstOrFail();

        //log transaction
        CoinTransaction::create([
            'sender_id' => $user->id,
            'receiver_id' => $user->id,
            'coins' => $data['coins'],
        ]);

        /** @var Coin $coins */
        $coin = $user->coin;

        $coin->noMutation = true;
        $coin->current_coins = $coin->current_coins + $data['coins'];
        $coin->total_coins = $coin->total_coins + $data['coins'];
        $coin->save();
    }
}