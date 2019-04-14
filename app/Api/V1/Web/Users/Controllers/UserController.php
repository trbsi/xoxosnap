<?php

namespace App\Api\V1\Web\Users\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Web\Users\Repositories\User\FollowUser\FollowUserRepository;

class UserController extends Controller
{
    public function followUser(Request $request, FollowUserRepository $followUserRepository)
    {
        $data = $request->validate([
            'userId' => 'required|integer', //id of a user who to follow
        ]);
        return response()->json($followUserRepository->follow($data['userId']));
    }
}
