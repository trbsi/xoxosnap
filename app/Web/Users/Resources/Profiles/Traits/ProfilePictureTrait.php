<?php

namespace App\Web\Users\Resources\Profiles\Traits;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

trait ProfilePictureTrait
{
    public function getProfilePicturePath(int $userId, string $picture): string
    {
        //storage/user/profile/8/GirlSlap.jpg
        $path = sprintf('storage%s%d/%s', UserProfile::USER_PICTURE_PATH, $userId, $picture);
        return asset($path);
    }

    public function getProfilePictureAbsolutePath(int $userId, string $picture): string
    {
        $pathPrefix = Storage::getAdapter()->getPathPrefix(); //->/htdocs/site/storage/app/public/
        $pathPrefix = rtrim($pathPrefix, '/');
        $path = sprintf('%s%s%d/%s', $pathPrefix, UserProfile::USER_PICTURE_PATH, $userId, $picture);
        return $path;
    }

    public function getProfilePictureRelativePath(int $userId, string $picture): string
    {
        $path = sprintf('%s%d/%s', UserProfile::USER_PICTURE_PATH, $userId, $picture);
        return $path;
    }

    public function getProfilePictureUploadPath(int $userId): string
    {
        //->/user/profile/8
        $path = sprintf('%s%d', UserProfile::USER_PICTURE_PATH, $userId);
        return $path;
    }
}
