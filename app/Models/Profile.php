<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;
    public const GENDER_TRANS = 3;

    public static $genders = [
        self::GENDER_MALE => 'male',
        self::GENDER_FEMALE => 'female',
        self::GENDER_TRANS => 'trans',
    ];

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users_profiles';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'description', 'birthday', 'current_city', 'gender', 'business_email', 'website', 'facebook', 'instagram', 'twitter', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
