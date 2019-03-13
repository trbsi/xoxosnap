<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Web\Users\Resources\Profiles\Repositories\Profile\ProfileRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($username, ProfileRepository $profileRepository)
    {
        //if user doesn't exist
        $user = User::where('username', $username)
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

    public function about($username)
    {
    	return view('web.users.resources.profiles.about.about', [
    		'username' => $username
    	]);
    }
}
