<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;
    public const GENDER_TRANS = 3;

    public const USER_PICTURE_PATH = '/user/profile/';

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

	public function user()
	{
        return $this->belongsTo(User::class);
	}
}
