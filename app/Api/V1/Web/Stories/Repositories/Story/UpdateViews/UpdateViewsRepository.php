<?php

namespace App\Api\V1\Web\Stories\Repositories\Story\UpdateViews;

use App\Models\Story;
use DB;

class UpdateViewsRepository 
{
	public function updateViews(array $ids)
	{
		$story = Story::whereIn('id', array_unique($ids))
			->update([
				'views' => DB::raw('views + 1'), 
			]);
	}
}
