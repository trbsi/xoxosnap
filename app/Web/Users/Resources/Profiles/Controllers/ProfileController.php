<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Web\Users\Resources\Profiles\Repositories\Profile\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed\IsUserFollowedRepository;

class ProfileController extends Controller
{
    public function profile($username, ProfileRepository $profileRepository)
    {
        $user = User::where('username', $username)
        ->where('profile_type', User::USER_TYPE_PERFORMER)
        ->with(['profile'])
        ->firstOrFail();

        $authUser = Auth::user();

        $storiesMedia = $profileRepository->getStoriesAndMedia($user, $authUser);

        $data = array_merge($storiesMedia, [
            'user' => $user,
            'authUser' => $authUser,
        ]);

    	return view('web.users.resources.profiles.profile.profile', $data);
    }

    public function about($username, IsUserFollowedRepository $isUserFollowedRepository)
    {
        $user = User::where('username', $username)
        ->with(['profile'])
        ->firstOrFail();

        $authUser = Auth::user();

        $isUserFollowed = $isUserFollowedRepository->isUserFollowed($user->id, $authUser);

    	return view('web.users.resources.profiles.about.about', [
            'user' => $user,
            'authUser' => $authUser,
            'isUserFollowed' => $isUserFollowed,
    	]);
    }

    public function editProfile(Request $request)
    {
        $user = $authUser = Auth::user();
        return view('web.users.resources.profiles.edit-profile.edit-profile', [
            'user' => $user,
            'authUser' => $authUser,
        ]);
    }
}
