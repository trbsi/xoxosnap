<?php

namespace App\Web\Stories\Resources\Media\Traits;

use App\Models\StoryMedia;

trait StoryMediaFileTrait
{
    public function getStoryMediaPath(int $userId, string $year, string $month, string $fileName): string
    {
    	 //->/user/media/{user_id}/{year}/{month}/video.mp4
        $path = sprintf('storage%s%s/%s/%s/%s', StoryMedia::STORY_MEDIA_PATH, $userId, $year, $month, $fileName);
        return asset($path);
    }
}
