<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Westsworld\TimeAgo;
use DateTime;

class Notification extends Model
{
    //followers
    public const TYPE_PERFORMER_NEW_FOLLOWER = 1;

    //notifications
    public const TYPE_PERFORMER_NEW_PURCHASE = 2;
    public const TYPE_VIEWER_PERFORMER_POSTED = 3;

    private $timeAgo = null;

    protected $table = 'notifications';

    protected $casts = [
        'user_id' => 'int',
        'notification_type' => 'int',
        'by_user_id' => 'int',
        'is_read' => 'boolean'
    ];

    protected $fillable = [
        'user_id',
        'notification_type',
        'by_user_id',
        'content',
        'is_read'
    ];

    protected $appends = [
        'created_ago'
    ];

    public function byUser()
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }

    public function getCreatedAgoAttribute()
    {
        if (null === $this->timeAgo) {
            $this->timeAgo = new TimeAgo();
        }
        return $this->timeAgo->inWords(new DateTime($this->created_at));
    }
}
