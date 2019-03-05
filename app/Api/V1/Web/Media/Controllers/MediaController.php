<?php

namespace App\Api\V1\Web\Media\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Media\Repositories\UpdateViews\UpdateViewsRepository;
use App\Api\V1\Web\Media\Repositories\Like\LikeRepository;

class MediaController extends Controller
{
	public function updateViews(Request $request, UpdateViewsRepository $updateViewsRepository)
	{
		$data = $request->validate([
            'id' => 'required|integer',
        ]);
		return response()->json($updateViewsRepository->update($data, $request->id));
	}

	public function like(Request $request, LikeRepository $likeRepository)
	{
		$data = $request->validate([
	        'id' => 'required|integer',
	    ]);

	    return response()->json($likeRepository->like($request->id));

	}
}
