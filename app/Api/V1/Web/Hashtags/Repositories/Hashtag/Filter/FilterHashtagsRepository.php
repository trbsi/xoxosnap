<?php

namespace App\Api\V1\Web\Hashtags\Repositories\Hashtag\Filter;

use App\Models\Hashtag;

class FilterHashtagsRepository 
{
	public function filter(string $hashtag): array
	{
		$hashtags = Hashtag::select('*')
			->limit(10)
			->selectRaw(sprintf('MATCH(name) AGAINST("%s*" IN BOOLEAN MODE) as score', $hashtag))
			->whereRaw(sprintf('MATCH(name) AGAINST("%s*" IN BOOLEAN MODE)', $hashtag))
			->orderBy('score', 'DESC')
			->get();

		$result = [];
		foreach ($hashtags as $hashtag) {
			$result[] = [
				'id' => $hashtag->id,
				'name' => $hashtag->name,
			];
		}

		return $result;
	}
}