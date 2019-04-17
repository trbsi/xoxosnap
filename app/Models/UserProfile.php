<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Web\Users\Resources\Profiles\Traits\ProfilePictureTrait;
use App\Web\Users\Resources\Profiles\Traits\GenderTrait;
use App\Helpers\Traits\NumberFormatterTrait;

class UserProfile extends Model
{
    use ProfilePictureTrait, GenderTrait, NumberFormatterTrait;

    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;
    public const GENDER_TRANS = 3;

    public const USER_PICTURE_PATH = '/user/profile/';
    public const NO_PROFILE_PICTURE_PATH = '/img/no_profile_picture.jpg';

    public static $genders = [
        self::GENDER_MALE => 'male',
        self::GENDER_FEMALE => 'female',
        self::GENDER_TRANS => 'trans',
    ];

    protected $table = 'users_profiles';

    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int',
        'gender' => 'int',
        'badge' => 'int'
    ];

    protected $dates = [
        'birthday'
    ];

    protected $fillable = [
        'user_id',
        'picture',
        'description',
        'birthday',
        'current_city',
        'gender',
        'business_email',
        'badge',
        'website',
        'facebook',
        'instagram',
        'twitter'
    ];


    public function getPictureAttribute($value)
    {
        if (null === $value) {
            return self::NO_PROFILE_PICTURE_PATH;
        }

        //this is probably external URL
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return $this->getProfilePicturePath($this->user_id, $value);
    }

    public function getGenderAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (null === $value) {
            return '-';
        }

        return $this->getGender($value);
    }

    public function getWebsiteAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return $value;
        }

        return $value;
    }

    public function getFollowersAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        return $this->formatNumber($value);
    }

    public function getVideosAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        return $this->formatNumber($value);
    }

    public function getDescriptionAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return '-';
        }

        return $value;
    }

    public function getBirthdayAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return '-';
        }

        return $value;
    }

    public function getCurrentCityAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return '-';
        }

        return $value;
    }

    public function getBusinessEmailAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return '-';
        }

        return $value;
    }

    public function getInstagramAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return $value;
        }

        return sprintf('https://www.instagram.com/%s', $value);
    }

    public function getTwitterAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return $value;
        }

        return sprintf('https://twitter.com/%s', $value);
    }

    public function getFacebookAttribute($value)
    {
        if ($this->noMutation) {
            return $value;
        }

        if (empty($value)) {
            return $value;
        }

        return sprintf('https://www.facebook.com/%s', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}