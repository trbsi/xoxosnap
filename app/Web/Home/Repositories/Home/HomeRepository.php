<?php

namespace App\Web\Home\Repositores\Home;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeRepository 
{
	public function getDataForHomePage(): array
	{
		$user = Auth::user();
		//guest
		if (null === $user) {
			$data['performers'] = $this->getRandomPerformers();
			$data['isGuest'] = true;
		} else {
			$this->getAuthenticatedHomePage();
			$data['isGuest'] = false;
		}

		return $data;
	}

	private function getRandomPerformers(): object
	{
		//get 5 recent performers
		$recent = User::where('profile_type', User::USER_TYPE_PERFORMER)
					->orderBy('id', 'DESC')
					->with(['profile'])
					->limit(5)
					->get();

		//get 5 with most followers
		$mostPopular = User::where('profile_type', User::USER_TYPE_PERFORMER)
					->whereHas('profile', function ($query) {
					    $query->orderBy('followers', 'DESC');
					})
					->with(['profile'])
					->limit(5)
					->get();

		$performers = $recent->merge($mostPopular);
		$performers = $performers->shuffle();

		return $performers;
	}
}
