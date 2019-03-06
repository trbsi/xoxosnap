<?php

namespace App\Web\Home\Repositores\Home;

use App\Models\User;
use App\Models\Media;
use App\Models\Story;
use App\Web\Stories\Repositories\RecentStories\RecentStoriesRepository;

class HomeRepository 
{
	private $recentStoriesRepository;

	public function __construct(RecentStoriesRepository $recentStoriesRepository)
	{
		$this->recentStoriesRepository = $recentStoriesRepository;
	}

	/**
	 * @param User $user Loggedin user
	 */
	public function getDataForHomePage(?User $user): array
	{
		//guest
		if (null === $user) {
			return $this->getRandomPerformers();
		} else {
			if(User::USER_TYPE_PERFORMER === $user->profile_type) {
				return $this->getPerformerHomePage();
			} elseif (User::USER_TYPE_VIEWER === $user->profile_type) {
				return $this->getViewerHomePage($user);
			}
		}
	}

	private function getRandomPerformers(): array
	{
		//get 5 recent performers
		$recent = User::where('profile_type', User::USER_TYPE_PERFORMER)
					->orderBy('id', 'DESC')
					->with(['profile'])
					->limit(6)
					->get();

		//get 5 with most followers
		$mostPopular = User::where('profile_type', User::USER_TYPE_PERFORMER)
					->whereHas('profile', function ($query) {
					    $query->orderBy('followers', 'DESC');
					})
					->with(['profile'])
					->limit(6)
					->get();

		$performers = $recent->merge($mostPopular);
		$performers = $performers->shuffle();

		return ['performers' => $performers];
	}

	private function getViewerHomePage(User $user): array
	{
		$followsIds = $user->follows()->pluck('user_id');
		
		//get recent videos of performers user follows		
		$videos = Media::whereIn('user_id', $followsIds)
		->select('*')
		->selectRaw('IF((SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_paid', [$user->id])
		->selectRaw('IF((SELECT COUNT(*) FROM media_likes WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_liked', [$user->id])
		->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
		->with(['user.profile'])
		->orderBy('id', 'DESC')
		->paginate(9);

		//get stories of performers user follows
		$stories = $this->recentStoriesRepository->getRecentStoriesOfFollowedUsers($followsIds, $user->id);

		return ['videos' => $videos, 'stories' => json_encode($stories)];
	}
}
