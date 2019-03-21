<?php

namespace App\Web\Home\Repositores\Home\Explore;

use App\Web\Stories\Repositories\RecentStories\RecentStoriesRepository;
use App\Web\Media\Repositories\RecentMedia\RecentMediaRepository;
use Illuminate\Support\Facades\Auth;
use App\Web\Media\Repositories\ListMedia\ListMediaRepository;

class ExploreRepository 
{
	private $recentStoriesRepository;
	private $listMediaRepository;

	public function __construct(
		RecentStoriesRepository $recentStoriesRepository,
		ListMediaRepository $listMediaRepository
	) {
		$this->recentStoriesRepository = $recentStoriesRepository;
		$this->listMediaRepository = $listMediaRepository;
	}

	public function getDataForExplorePage(?int $exploreType): array
	{
		$userId = Auth::id();
		$data['stories'] = json_encode($this->recentStoriesRepository->getRecentStoriesGlobally($userId));
		$data['media'] = $this->listMediaRepository->getMediaByOrderType($exploreType, $userId);

		return $data;
	}
}
