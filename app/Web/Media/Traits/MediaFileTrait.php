<?php

namespace App\Web\Media\Traits;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;

trait MediaFileTrait
{
    public function getMediaPath(int $userId, string $year, string $month, string $fileName): string
    {
    	 //->/user/media/{user_id}/{year}/{month}/video.mp4
        $path = sprintf('storage%s%s/%s/%s/%s', Media::MEDIA_PATH, $userId, $year, $month, $fileName);
        return asset($path);
    }

    public function getMediaAbsoluteUploadPath(int $userId): string
    {
    	$year = date('Y');
    	$month = date('m');
        $pathPrefix = Storage::getAdapter()->getPathPrefix(); //->/htdocs/pornsnap/site/storage/app/public/
        $pathPrefix = rtrim($pathPrefix, '/');
        $pathPrefix = rtrim($pathPrefix, '\\');
        $path = sprintf('%s%s%d/%s/%s', $pathPrefix, Media::MEDIA_PATH, $userId, $year, $month);
        return $path;
    }

    public function getMediaUploadPath(int $userId): string
    {
    	$year = date('Y');
    	$month = date('m');

    	//-> /user/media/00/11/22
    	$path = sprintf('%s%s/%s/%s', Media::MEDIA_PATH, $userId, $year, $month);
    	return $path;
    }
}
