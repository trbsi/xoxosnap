<?php

namespace App\Api\V1\Web\Coins\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Coins\Repositories\Update\UpdateRepository;

class CoinController extends Controller
{
	public function purchase(Request $request, UpdateRepository $updateRepository)
	{
		$data = $request->validate([
            'id' => 'required|integer',
            'type' => 'required|in:video,story',
        ]);

	    $data = $updateRepository->purchase($data['id'], $data['type']);
	    return response()->json($data);
	}
}