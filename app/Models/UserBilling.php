<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBilling extends Model
{
    protected $table = 'users_billings';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'bank_account_number'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
