<?php

namespace App\Web\Home\Repositores\Home;

use App\Models\User;
use App\Models\Media;
use App\Models\Story;

class HomeRepository 
{
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
		->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
		->orderBy('id', 'DESC')
		->paginate(9);

		//get stories of performers user follows
		$stories = Story::whereIn('user_id', $followsIds)
		->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
		->with(['media'])
		->orderBy('id', 'DESC')
		->paginate(10);

		return ['videos' => $videos, 'stories' => $stories];
	}
}
