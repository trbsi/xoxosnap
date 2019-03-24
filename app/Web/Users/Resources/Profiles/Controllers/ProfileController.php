<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Media;
use App\Web\Users\Resources\Profiles\Repositories\Profile\Profile\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed\IsUserFollowedRepository;

class ProfileController extends Controller
{
    private $user;

    public function callAction($method, $parameters)
    {
        if (isset($parameters['username'])) {
            $this->user = User::where('username', $parameters['username'])
            ->where('profile_type', User::USER_TYPE_PERFORMER)
            ->with(['profile'])
            ->firstOrFail();
        }

        return parent::callAction($method, $parameters);
    }

    public function profile($username, ProfileRepository $profileRepository)
    {
        $authUser = Auth::user();

        $storiesMedia = $profileRepository->getStoriesAndMedia($this->user, $authUser);

        $data = array_merge($storiesMedia, [
            'user' => $this->user,
            'authUser' => $authUser,
        ]);

    	return view('web.users.resources.profiles.profile.profile.profile', $data);
    }

    public function about($username, IsUserFollowedRepository $isUserFollowedRepository)
    {
        $authUser = Auth::user();
        $isUserFollowed = $isUserFollowedRepository->isUserFollowed($this->user->id, $authUser);

    	return view('web.users.resources.profiles.profile.about.about', [
            'user' => $this->user,
            'authUser' => $authUser,
            'isUserFollowed' => $isUserFollowed,
    	]);
    }

    public function userSingleVideo($username, $slug)
    {
        $slugExplode = explode('-', $slug);
        $videoId = (int) end($slugExplode); 
        $media = Media::findOrFail($videoId);

        return view('web.users.resources.profiles.profile.user-single-video.user-single-video', [
            'user' => $this->user,
            'media' => $media,
            'authUser' => Auth::user(),
    	]);
    }
}
