<?php

namespace App\Api\V1\Web\Coins\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Coins\Repositories\Coin\PurchaseMedia\PurchaseMediaRepository;

class CoinController extends Controller
{
	public function purchaseMedia(Request $request, PurchaseMediaRepository $purchaseRepository)
	{
		$data = $request->validate([
            'id' => 'required|integer',
            'type' => 'required|in:video,story',
        ]);

	    $data = $purchaseRepository->purchase($data['id'], $data['type']);
	    return response()->json($data);
	}
}
