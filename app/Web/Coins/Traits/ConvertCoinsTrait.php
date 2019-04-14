<?php

namespace App\Web\Coins\Traits;

use App\Models\Coin;

trait ConvertCoinsTrait
{
    /**
     * 0-10 (max $1)
     * 10-100 (max $10)
     * 100-1000 (max $100)
     * 1000+ ($100+)
     */
    public function convertMoneyToCoins(int $cost): int
    {
        return $cost * Coin::COIN_COST;
    }

    public function convertCoinsToMoneyFloor(int $coins): int
    {
        return (int)floor($coins / Coin::COIN_COST);
    }

    public function convertCoinsToMoneyCeil(int $coins): int
    {
        return (int)ceil($coins / Coin::COIN_COST);
    }
}
