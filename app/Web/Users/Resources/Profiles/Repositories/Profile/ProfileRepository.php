<?php

namespace App\Web\Users\Resources\Profiles\Repositories\Profile;

use App\Models\User;
use App\Web\Stories\Repositories\RecentStories\RecentStoriesRepository;
use App\Web\Media\Repositories\RecentMedia\RecentMediaRepository;

class ProfileRepository
{
	private $recentStoriesRepository;
	private $recentMediaRepository;

	public function __construct(
		RecentStoriesRepository $recentStoriesRepository,
		RecentMediaRepository $recentMediaRepository
	) {
		$this->recentStoriesRepository = $recentStoriesRepository;
		$this->recentMediaRepository = $recentMediaRepository;
	}

    public function getStoriesAndMedia(User $user, User $authUser): array
    {
		//get recent media of performers user follows		
		$media = $this->recentMediaRepository->getRecentMediaOfUser($user->id);

		//get stories of performers user follows
		$stories = $this->recentStoriesRepository->getRecentStoriesOfUser($user->id);

		$isUserFollowed = $this->isUserFollowed($authUser, $user->id);

        return [
        	'stories' => json_encode($stories),
        	'media' => $media,
        	'isUserFollowed' => $isUserFollowed,
        ];
    }

    private function isUserFollowed(User $authUser, int $userId): bool
    {
    	return $authUser->follows()->where('followers.user_id', $userId)->exists();
    }
}
