<?php

namespace App\Api\V1\Web\Coins\Controllers;

use App\Api\V1\Web\Coins\Repositories\Coin\PaymentGatewayCallback\PaymentGatewayCallbackRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Coins\Repositories\Coin\PurchaseMedia\PurchaseMediaRepository;
use Exception;

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


    public function paymentGatewayCallback(
        Request $request,
        PaymentGatewayCallbackRepository $gatewayCallbackRepository
    ) {
	    if (base64_encode(env('CCBILL_ACCESS_KEY')) !== $request->access_token) {
	        abort(403, 'No access');
        }

	    try {
            $gatewayCallbackRepository->processCallback($request->all());
            return response()->json();
        } catch (Exception $e) {
	        abort(400, $e->getMessage());
        }
    }
}
