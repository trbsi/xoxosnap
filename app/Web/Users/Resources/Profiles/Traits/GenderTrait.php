<?php

namespace App\Web\Users\Resources\Profiles\Traits;

use App\Models\UserProfile;

trait GenderTrait
{
    public function getGender(int $gender): string
    {
        $genderKey = UserProfile::$genders[$gender];

        return __(sprintf('web/users/user.%s', $genderKey));
    }
}
