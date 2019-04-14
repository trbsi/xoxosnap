<?php

namespace App\Web\Stories\Traits;

use App\Models\Story;
use Illuminate\Support\Facades\Storage;

trait StoryFileTrait
{
    public function getStoryUploadPath(int $userId): string
    {
        $year = date('Y');
        $month = date('m');

        //-> /user/stories/00/11/22
        $path = sprintf('%s%s/%s/%s', Story::STORY_PATH, $userId, $year, $month);
        return $path;
    }

    public function getStoryPictureAbsolutePath(int $userId, string $picture, string $year, string $month): string
    {
        $pathPrefix = Storage::getAdapter()->getPathPrefix(); //->/htdocs/site/storage/app/public/
        $pathPrefix = rtrim($pathPrefix, '/');
        $pathPrefix = rtrim($pathPrefix, '\\');
        $path = sprintf('%s%s%d/%s/%s/%s', $pathPrefix, Story::STORY_PATH, $userId, $year, $month, $picture);
        return $path;
    }
}
