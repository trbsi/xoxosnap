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
    public function convertToNaughtyCoins(int $cost): int
    {
    	return $cost * Coin::COIN_COST;
    }

    public function convertToMoney(int $coins): float
    {
    	return round($coins / Coin::COIN_COST, 2);
    }
}
