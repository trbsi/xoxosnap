<?php

namespace App\Api\V1\Web\Hashtags\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Hashtags\Repositories\Hashtag\Filter\FilterHashtagsRepository;

class HashtagController extends Controller
{
    public function filter(Request $request, FilterHashtagsRepository $filterHashtagsRepository)
    {
        $result = $filterHashtagsRepository->filter($request->q);
        return response()->json($result);
    }
}
