<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Media;
use App\Web\Users\Resources\Profiles\Repositories\Profile\Profile\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed\IsUserFollowedRepository;
use App\Web\Media\Repositories\One\GetOneMediaRepository;

class ProfileController extends Controller
{
    private $user;
    private $isUserFollowedRepository;
    private $isUserFollowed;
    private $authUser;

    public function __construct(IsUserFollowedRepository $isUserFollowedRepository)
    {
        $this->isUserFollowedRepository = $isUserFollowedRepository;
    }

    public function callAction($method, $parameters)
    {
        $this->authUser = Auth::user();

        if (isset($parameters['username'])) {
            $this->user = User::where('username', $parameters['username'])
            ->where('profile_type', User::USER_TYPE_PERFORMER)
            ->with(['profile'])
            ->firstOrFail();
        
            $this->isUserFollowed = $this->isUserFollowedRepository->isUserFollowed($this->user->id, $this->authUser);
    
        }

        return parent::callAction($method, $parameters);
    }

    public function profile($username, ProfileRepository $profileRepository)
    {
        $storiesMedia = $profileRepository->getStoriesAndMedia($this->user, $this->authUser);

        $data = array_merge($storiesMedia, [
            'user' => $this->user,
            'authUser' => $this->authUser,
            'isUserFollowed' => $this->isUserFollowed,
        ]);

    	return view('web.users.resources.profiles.profile.profile.profile', $data);
    }

    public function about($username)
    {
    	return view('web.users.resources.profiles.profile.about.about', [
            'user' => $this->user,
            'authUser' => $this->authUser,
            'isUserFollowed' => $this->isUserFollowed,
    	]);
    }

    public function userSingleVideo($username, $slug, GetOneMediaRepository $getOneVideoRepository)
    {
        $slugExplode = explode('-', $slug);
        $videoId = (int) end($slugExplode); 
        $media = $getOneVideoRepository->getOneVideo($videoId, Auth::id());

        return view('web.users.resources.profiles.profile.user-single-video.user-single-video', [
            'user' => $this->user,
            'media' => $media,
            'authUser' => $this->authUser,
            'isUserFollowed' => $this->isUserFollowed,
    	]);
    }
}
