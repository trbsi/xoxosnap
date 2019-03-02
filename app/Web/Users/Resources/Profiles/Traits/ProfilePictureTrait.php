<?php

namespace App\Web\Users\Resources\Profiles\Traits;

use App\Models\UserProfile;

trait ProfilePictureTrait
{
    public function getProfilePicturePath(int $userId, string $picture): string
    {
        //storage/user/profile/8/GirlSlap.jpg
        $path = sprintf('storage%s%d/%s', UserProfile::USER_PICTURE_PATH, $userId, $picture);
        return asset($path);
    }
}
