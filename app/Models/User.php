<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserProfile;
use App\Models\Media;
use App\Models\Coin;
use App\Models\Notification;
use App\Models\Stories;

class User extends Authenticatable
{
    use Notifiable;

    public const USER_TYPE_PERFORMER = 1;
    public const USER_TYPE_VIEWER = 2;

    public const PROVIDER_TWITTER = 'twitter';

    protected $table = 'users';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'profile_type',
        'provider',
        'provider_id',
        'has_notification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'name' => 'string',
        'email' => 'string',
        'username' => 'string',
        'profile_type' => 'integer',
        'provider' => 'string',
        'provider_id' => 'integer',
        'has_notification' => 'boolean',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function coin()
    {
        return $this->hasOne(Coin::class, 'user_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'user_id');
    }

    public function stories()
    {
        return $this->hasMany(Story::class, 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

}
