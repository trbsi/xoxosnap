<?php

namespace App\Web\Media\Traits;

use App\Models\Media;

trait MediaFileTrait
{
    public function getMediaPath(int $userId, string $year, string $month, string $fileName): string
    {
    	 //->/user/media/{user_id}/{year}/{month}/video.mp4
        $path = sprintf('storage%s%s/%s/%s/%s', Media::MEDIA_PATH, $userId, $year, $month, $fileName);
        return asset($path);
    }
}
