<?php

namespace App\Api\V1\Web\Stories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Stories\Requests\Story\Create\CreateStoryRequest;
use App\Api\V1\Web\Stories\Repositories\Story\Create\CreateRepository;
use Exception;

class StoryController extends Controller
{
	public function create(CreateStoryRequest $createStoryRequest, CreateRepository $createRepository)
	{
		try {
			$createRepository->create($createStoryRequest->all());
			return response()->json();
		} catch (Exception $e) {
			abort(400, $e->getMessage());
		}
	}
}
