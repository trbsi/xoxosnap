<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NotificationCount extends Model
{
    protected $table = 'notifications_counts';

    protected $casts = [
        'user_id' => 'int',
        'new_followers' => 'int',
        'new_notifications' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'new_followers',
        'new_notifications',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
