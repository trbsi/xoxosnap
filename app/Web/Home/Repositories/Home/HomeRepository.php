<?php

namespace App\Web\Home\Repositores\Home;

use App\Models\User;
use App\Models\Media;
use App\Models\Story;
use App\Web\Stories\Repositories\RecentStories\RecentStoriesRepository;
use App\Web\Media\Repositories\FollowedUsers\FollowedUsersRepository;
use App\Web\Coins\Traits\ConvertCoinsTrait;

class HomeRepository 
{
	use ConvertCoinsTrait;

	private $recentStoriesRepository;
	private $followedUsersRepository;

	public function __construct(
		RecentStoriesRepository $recentStoriesRepository,
		FollowedUsersRepository $followedUsersRepository
	) {
		$this->recentStoriesRepository = $recentStoriesRepository;
		$this->followedUsersRepository = $followedUsersRepository;
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
				return $this->getPerformerHomePage($user);
			} elseif (User::USER_TYPE_VIEWER === $user->profile_type) {
				return $this->getViewerHomePage($user);
			}
		}
	}

	private function getRandomPerformers(): array
	{
		//get 6 recent performers
		$recent = User::where('profile_type', User::USER_TYPE_PERFORMER)
					->orderBy('id', 'DESC')
					->with(['profile'])
					->limit(6)
					->get();

		//get 6 with most followers
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

		if (true === $followsIds->isEmpty()) {
			return array_merge(
				$this->getRandomPerformers(),
				[
					'videos' => [],
				]
			);
		}
		
		//get recent videos of performers user follows		
		$videos = $this->followedUsersRepository->getMediaOfFollowedUsers($followsIds, $user->id);

		//get stories of performers user follows
		$stories = $this->recentStoriesRepository->getRecentStoriesOfFollowedUsers($followsIds, $user->id);

		return ['videos' => $videos, 'stories' => json_encode($stories)];
	}

	private function getPerformerHomePage(User $user)
	{
		//Coins/earnings
		$currentCoins = $user->coin->current_coins;
		$currentMoney = $this->convertToMoney($currentCoins);

		$totalCoins = $user->coin->total_coins;
		$totalMoney = $this->convertToMoney($totalCoins);

		//Broj followera
		$profile = $user->profile;
		$profile->noMutation = true;
		$followersCount = $profile->followers;

		//most bought videos
		$mostBoughtVideos = Media::selectRaw('media.id, media.title, SUM(media.cost) AS total_earned_money')
		->join('media_purchases', 'media_purchases.media_id', '=', 'media.id')
		->where('media.user_id',  $user->id)
		->groupBy(['media.id', 'media.title'])
		->limit(10)
		->orderBy('total_earned_money', 'DESC')
		->get()
		->map(function($result) {
			$result->earned_coins = $this->convertToNaughtyCoins($result->total_earned_money);
			return $result;
		});

		return [
			'currentCoins' => $currentCoins,
			'currentMoney' => $currentMoney,
			'totalCoins' => $totalCoins,
			'totalMoney' => $totalMoney,
			'followersCount' => $followersCount,
			'mostBoughtVideos' => $mostBoughtVideos,
		];
	}
}
