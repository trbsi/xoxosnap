<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StoryMedia;
use App\Models\User;

class Story extends Model
{
	public const STORY_PATH = '/user/stories/';
	public const MAX_STORY_VIDEO_DURATION = 30; //seconds

	public const EXPIRY_TYPE_NEVER = 'never';
	public const EXPIRY_TYPE_CUSTOM = 'custom';

	public const EXPIRY_TIME_MINUTES = 'minutes';
	public const EXPIRY_TIME_HOURS = 'hours';

	protected $table = 'stories';

	protected $casts = [
		'user_id' => 'int',
		'cost' => 'int',
		'user_paid' => 'boolean', //see RecentStoriesRepository::getRecentStoriesOfUsers
		'views' => 'int',
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'user_id',
		'cost',
		'expires_at'
	];

	protected $appends = [
		'is_locked',
	];

	public function getIsLockedAttribute()
	{
		if (0 === $this->cost) {
			return false;
		} elseif ($this->cost > 0 && true === $this->user_paid) {
			return false;
		} else {
			return true;
		}
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function media()
    {
        return $this->hasMany(StoryMedia::class, 'story_id');
    }

    public function purchases()
	{
		return $this->belongsToMany(User::class, 'stories_purchases', 'story_id', 'user_id');
	}
}
