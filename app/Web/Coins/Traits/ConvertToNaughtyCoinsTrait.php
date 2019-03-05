<?php

namespace App\Web\Coins\Traits;

trait ConvertToNaughtyCoinsTrait
{
	/**
	 * 0-10 (max $1)
	 * 10-100 (max $10)
	 * 100-1000 (max $100)
	 * 1000+ ($100+)
	 */	
    public function convertToNaughtyCoins(int $cost): int
    {
    	return $cost * 10;
    }
}
