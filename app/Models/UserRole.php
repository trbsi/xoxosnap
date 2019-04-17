<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';
    public const ROLE_GUEST = 'guest';

    protected $table = 'users_roles';

    protected $fillable = [
        'role_key',
        'role_description'
    ];

    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'role_id');
    }
}
