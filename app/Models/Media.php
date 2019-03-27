<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Hashtag;
use App\Web\Media\Traits\MediaFileTrait;
use Westsworld\TimeAgo;
use DateTime;
use App\Helpers\Traits\NumberFormatterTrait;
use App\Web\Coins\Traits\ConvertCoinsTrait;
use Illuminate\Support\Facades\Auth;

class Media extends Model
{
	use MediaFileTrait, NumberFormatterTrait, ConvertCoinsTrait;
	
	public const MEDIA_PATH = '/user/media/';

	public const EXPIRY_TYPE_NEVER = 'never';
	public const EXPIRY_TYPE_CUSTOM = 'custom';
	public const EXPIRY_TIME_DAYS = 'days';
	public const EXPIRY_TIME_HOURS = 'hours';
	public const EXPIRY_TIME_MINUTES = 'minutes';

	public const ORDER_TYPE_RECENT = 1;
	public const ORDER_TYPE_ENDING_SOON = 2;
	public const ORDER_TYPE_MOST_VIEWED = 3;
	public const ORDER_TYPE_MOST_PAID = 4;

	public const MAX_VIDEO_DURATION = 120; //seconds

	private $timeAgo = null;

	protected $table = 'media';

	protected $casts = [
		'user_id' => 'int',
		'cost' => 'int',
		'likes' => 'int',
		'views' => 'int',
		'user_paid' => 'boolean', //see HomeRepository::getViewerHomePage
		'user_liked' => 'boolean', //see HomeRepository::getViewerHomePage
		'purchased_count' => 'int',
		'duration' => 'int',
		'is_locked' => 'boolean',
		'progress_bar_duration' => 'int',
		'progress_bar_current_state' => 'float',
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'user_id',
		'title',
		'description',
		'file',
		'thumbnail',
		'cost',
		'expires_at',
		'likes',
		'duration',
	];

	protected $appends = [
		'published_ago',
		'progress_bar_duration',
		'progress_bar_current_state',
		'coins',
		'is_locked',
	];
	
	protected $with = ['user.profile', 'hashtags'];

	public function getFileAttribute($value)
	{
		if ($this->noMutation) {
			return $value;
		}

		$year = date('Y', strtotime($this->created_at));
		$month = date('m', strtotime($this->created_at));
		return $this->getMediaPath($this->user_id, $year, $month, $value);
	}

	public function getThumbnailAttribute($value)
	{
		if ($this->noMutation) {
			return $value;
		}
		
		$year = date('Y', strtotime($this->created_at));
		$month = date('m', strtotime($this->created_at));
		return $this->getMediaPath($this->user_id, $year, $month, $value);
	}

	public function getPublishedAgoAttribute()
	{
		if (null === $this->timeAgo) {
			$this->timeAgo = new TimeAgo();
		}
		return $this->timeAgo->inWords(new DateTime($this->created_at));
	}

	public function getProgressBarDurationAttribute()
	{
		if (null === $this->expires_at) {
			return 0;
		}

		return strtotime($this->expires_at) - time();
	}

	public function getProgressBarCurrentStateAttribute()
	{
		if (null === $this->expires_at) {
			return 0;
		}

		$end = strtotime($this->expires_at);
		$start = strtotime($this->created_at);
		$current = time();
		$completed = (($current - $start) / ($end - $start));
		return round(1 - $completed, 2);
	}

	public function getViewsAttribute($value)
	{
		if ($this->noMutation) {
			return $value;
		}

		return $this->formatNumber($value);
	}

	public function getLikesAttribute($value)
	{
		if ($this->noMutation) {
			return $value;
		}

		return $this->formatNumber($value);
	}

	public function getCoinsAttribute()
	{
		return $this->convertToNaughtyCoins($this->cost);
	}

	public function getIsLockedAttribute()
	{
		if ($this->user_id === Auth::id()) {
			return false;
		} else if (0 === $this->cost) {
			return false;
		} elseif ($this->cost > 0 && true === $this->user_paid) {
			return false;
		} else {
			return true;
		}
	}

	public function getDurationAttribute($value)
	{
		$minutes = floor(($value / 60) % 60);
		$seconds = $value % 60;
		if ($seconds <= 9) {
			$seconds = "0$seconds";
		}
		return "$minutes:$seconds";
	}

	public function getUrlAttribute($value)
	{
		return route('user.media-share', 
		[	
			'username' => $this->user->username,
			'slug' => $value,
		]);
	}

	public function getDescriptionAttribute($value)
	{
		return nl2br($value);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function likes()
	{
		return $this->belongsToMany(User::class, 'media_likes', 'media_id', 'user_id');
	}

	public function purchases()
	{
		return $this->belongsToMany(User::class, 'media_purchases', 'media_id', 'user_id');
	}

	public function hashtags()
	{
		return $this->belongsToMany(Hashtag::class, 'media_hashtags', 'media_id', 'hashtag_id');
	}
}
