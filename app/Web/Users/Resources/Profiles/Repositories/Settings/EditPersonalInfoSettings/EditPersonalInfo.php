<?php

namespace App\Web\Users\Resources\Profiles\Repositories\Settings\EditPersonalInfoSettings;

use App\Models\UserProfile;
use App\Helpers\Traits\ImageManipulationTrait;
use Illuminate\Support\Facades\Storage;
use App\Web\Users\Resources\Profiles\Traits\ProfilePictureTrait;

class EditPersonalInfo
{
    use ProfilePictureTrait, ImageManipulationTrait;

    public function editPersonalInfo(array $data, UserProfile $userProfile)
    {
        if (isset($data['picture'])) {
            $picture = $data['picture'];

            //remove old picture
            $this->removeOldPicture($userProfile);

            //upload new picture
            $pictureName = sprintf('%s_%s.%s', time(), $userProfile->user_id, $picture->extension());
            $uploadPath = $this->getProfilePictureUploadPath($userProfile->user_id);
            Storage::putFileAs($uploadPath, $picture, $pictureName);

            //resize and save
            $absolutePicturePath = $this->getProfilePictureAbsolutePath($userProfile->user_id, $pictureName);
            $this->resizeOrientateAndLowerImageQuality($absolutePicturePath, 500);
            $userProfile->picture = $pictureName;
        }

        $userProfile->birthday = $data['birthday'];
        $userProfile->description = $data['description'];
        $userProfile->current_city = $data['current_city'];
        $userProfile->gender = $data['gender'];
        $userProfile->business_email = $data['business_email'];
        $userProfile->website = $data['website'];
        $userProfile->facebook = $data['facebook'];
        $userProfile->instagram = $data['instagram'];
        $userProfile->twitter = $data['twitter'];
        $userProfile->save();
    }

    private function removeOldPicture(UserProfile $userProfile)
    {

        $absolutePath = $this->getProfilePictureAbsolutePath($userProfile->user_id, $userProfile->getOriginal('picture'));
        if (file_exists($absolutePath)) {
            $relativePath = $this->getProfilePictureRelativePath($userProfile->user_id, $userProfile->getOriginal('picture'));
            Storage::delete($relativePath);
        }
    }
}