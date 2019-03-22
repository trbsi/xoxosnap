<?php

namespace App\Api\V1\Web\Stories\Repositories\Story\UpdateViews;

use App\Models\Story;

class UpdateViewsRepository 
{
	public function updateViews(int $id)
	{
		$story = Story::find($id);
		$story->increment('views');
	}
}
