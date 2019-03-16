<?php

namespace App\Web\Users\Resources\Profiles\Repositories\Profile\Profile;

use App\Models\User;
use App\Web\Stories\Repositories\RecentStories\RecentStoriesRepository;
use App\Web\Media\Repositories\RecentMedia\RecentMediaRepository;
use App\Web\Users\Resources\Profiles\Repositories\IsUserFollowed\IsUserFollowedRepository;

class ProfileRepository
{
	private $recentStoriesRepository;
	private $recentMediaRepository;
	private $isUserFollowedRepository;

	public function __construct(
		RecentStoriesRepository $recentStoriesRepository,
		RecentMediaRepository $recentMediaRepository,
		IsUserFollowedRepository $isUserFollowedRepository
	) {
		$this->recentStoriesRepository = $recentStoriesRepository;
		$this->recentMediaRepository = $recentMediaRepository;
		$this->isUserFollowedRepository = $isUserFollowedRepository;
	}

    public function getStoriesAndMedia(User $user, ?User $authUser): array
    {
		//get recent media of performers user follows		
		$media = $this->recentMediaRepository->getRecentMediaOfUser($user->id);

		//get stories of performers user follows
		$stories = $this->recentStoriesRepository->getRecentStoriesOfUser($user->id);

		$isUserFollowed = $this->isUserFollowedRepository->isUserFollowed($user->id, $authUser);

        return [
        	'stories' => json_encode($stories),
        	'media' => $media,
        	'isUserFollowed' => $isUserFollowed,
        ];
    }
}
