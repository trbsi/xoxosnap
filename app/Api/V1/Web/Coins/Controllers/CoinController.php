<?php

namespace App\Api\V1\Web\Coins\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Coins\Repositories\Update\UpdateRepository;

class CoinController extends Controller
{
	public function update(Request $request, UpdateRepository $updateRepository)
	{
	    $data = $updateRepository->update($request->id);
	    return response()->json($data);
	}
}
