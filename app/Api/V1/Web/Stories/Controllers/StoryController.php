<?php

namespace App\Api\V1\Web\Stories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Stories\Requests\Story\Create\CreateStoryRequest;
use App\Api\V1\Web\Stories\Repositories\Story\Create\CreateRepository;
use App\Api\V1\Web\Stories\Repositories\Story\UpdateViews\UpdateViewsRepository;
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

    public function updateViews(Request $request, UpdateViewsRepository $updateViewsRepository)
    {
        try {
            $data = $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'integer',
            ]);

            $updateViewsRepository->updateViews($data['ids']);
            return response()->json();
        } catch (Exception $e) {
            abort(400, $e->getMessage());
        }
    }
}
