<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public const ROLE_ADMIN = 'admin';

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
