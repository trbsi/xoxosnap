<?php

namespace App\Web\Stories\Repositories\RecentStories;

use App\Models\Story;
use App\Models\StoryMedia;
use DateTime;
use App\Web\Coins\Traits\ConvertCoinsTrait;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class RecentStoriesRepository
{
	use ConvertCoinsTrait;

	public function getRecentStoriesOfUser(int $userId, ?int $authUserId): array
	{
		return $this->getRecentStoriesOfUsers(collect([$userId]), (int) $authUserId);
	}	

    public function getRecentStoriesOfUsers(Collection $userIds, int $authUserId): array
    {
    	$stories = Story::whereIn('user_id', $userIds)
    	->select('*')
		->selectRaw('IF((SELECT COUNT(*) FROM stories_purchases WHERE user_id = ? AND story_id = stories.id) = 0, 0, 1) AS user_paid', [$authUserId])
    	->selectRaw('(SELECT MAX(updated_at) FROM stories_media WHERE story_id = stories.id) as max_updated_at')
		->whereRaw('(expires_at >= ?)', [date('Y-m-d H:i:s')])
		->with(['media', 'user.profile'])
		->orderBy('id', 'DESC')
		->limit(30)
		->get();

		return $this->createStoriesStructure($stories);
    }

    public function getRecentStoriesGlobally(?int $authUserId): array
    {
    	$stories = Story::select('*')
		->selectRaw('IF((SELECT COUNT(*) FROM stories_purchases WHERE user_id = ? AND story_id = stories.id) = 0, 0, 1) AS user_paid', [$authUserId])
    	->selectRaw('(SELECT MAX(updated_at) FROM stories_media WHERE story_id = stories.id) as max_updated_at')
		->whereRaw('(expires_at >= ?)', [date('Y-m-d H:i:s')])
		->with(['media.story', 'user.profile'])
		->orderBy('id', 'DESC')
		->limit(30)
		->get();

		return $this->createStoriesStructure($stories);
    }

    private function createStoriesStructure(EloquentCollection $stories): array
    {
		$array = [];
		foreach ($stories as $story) {
			$items = [];
			foreach ($story->media as $storyMedia) {
				$lastUpdatedAt = $this->getLastUpdatedAt($storyMedia->updated_at);
				$items[] = [
						'story_id' => sprintf('story-%s-%s', $story->user->username, $story->id),
						'media_type' => $storyMedia->type_value,
						'media_file' => $storyMedia->file,
						'duration' => (StoryMedia::TYPE_VIDEO === $storyMedia->type) ? 0 : 5,
						'preview' => (StoryMedia::TYPE_VIDEO === $storyMedia->type) ? '' : $storyMedia->file,
						'last_updated_at' => $lastUpdatedAt,
					];
			}

			$array[] = [
				'id' => $story->id,
				'photo' => $story->user->profile->picture,
				'name' => $story->user->name,
				'link' => '',
				'views' => $story->views,
				'last_updated_at' => $this->getLastUpdatedAt($story->max_updated_at),
				'is_locked' => $story->is_locked,
				'coins' => $this->convertToNaughtyCoins($story->cost),
				'items' => $items,
			];
		}

		return $array;
    }

    private function getLastUpdatedAt(string $lastUpdatedAt): int
    {
    	$now = new DateTime();
    	$lastUpdatedAt = new DateTime($lastUpdatedAt);

    	return round($now->getTimestamp() - $lastUpdatedAt->getTimestamp());
    }
}
