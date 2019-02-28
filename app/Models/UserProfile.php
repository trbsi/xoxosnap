<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use App\Models\User;

class UserProfile extends Eloquent
{
    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;
    public const GENDER_TRANS = 3;

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
