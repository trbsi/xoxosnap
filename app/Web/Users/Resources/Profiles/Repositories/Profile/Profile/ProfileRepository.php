<?php

namespace App\Web\Users\Resources\Profiles\Repositories\Profile\Profile;

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
    )
    {
        $this->recentStoriesRepository = $recentStoriesRepository;
        $this->recentMediaRepository = $recentMediaRepository;
    }

    public function getStoriesAndMedia(User $user, ?User $authUser): array
    {
        if (null !== $authUser) {
            $authUserId = $authUser->id;
        } else {
            $authUserId = null;
        }

        //get recent media of performers user follows
        $media = $this->recentMediaRepository->getRecentMediaOfUser($user->id, $authUserId);

        //get stories of performers user follows
        $stories = $this->recentStoriesRepository->getRecentStoriesOfUser($user->id, $authUserId);

        return [
            'stories' => json_encode($stories),
            'media' => $media,
        ];
    }
}
