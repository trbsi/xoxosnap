<?php

namespace App\Api\V1\Web\Media\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Media\Repositories\Media\UpdateViews\UpdateViewsRepository;
use App\Api\V1\Web\Media\Repositories\Media\Like\LikeRepository;
use App\Api\V1\Web\Media\Requests\Media\Create\CreateMediaRequest;
use App\Api\V1\Web\Media\Repositories\Media\Create\CreateRepository;
use Exception;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
	public function one(Request $request) 
	{
		$media = Media::where('id', $request->id)
		->select('*')
		->selectRaw('IF((SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_paid', [Auth::id()])
		->first();

		return response()->json($media);
	}

	public function updateViews(Request $request, UpdateViewsRepository $updateViewsRepository)
	{
		$data = $request->validate([
            'id' => 'required|integer',
        ]);
        
		return response()->json($updateViewsRepository->update($data['id']));
	}

	public function like(Request $request, LikeRepository $likeRepository)
	{
		$data = $request->validate([
	        'id' => 'required|integer',
	    ]);

	    return response()->json($likeRepository->like($data['id']));
	}

	public function create(CreateMediaRequest $createMediaRequest, CreateRepository $createRepository)
	{
		try {
			$createRepository->create($createMediaRequest->all());
			return response()->json();
		} catch (Exception $e) {
			abort(400, $e->getMessage());
		}
	}
}
