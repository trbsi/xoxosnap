<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Web\Stories\Resources\Media\Traits\StoryMediaFileTrait;
use App\Models\Story;

class StoryMedia extends Model
{
	use StoryMediaFileTrait;

	public const STORY_MEDIA_PATH = '/user/stories/';
	public const TYPE_VIDEO = 1;
	public const TYPE_PHOTO = 2;
	private static $types = [
		self::TYPE_VIDEO => 'video',
		self::TYPE_PHOTO => 'photo',
	];

	protected $table = 'stories_media';

	protected $casts = [
		'story_id' => 'int',
		'type' => 'int',
	];

	protected $fillable = [
		'story_id',
		'file',
		'type'
	];

	protected $appends = [
		'type_value'
	];

	public function getTypeValueAttribute()
	{
		return self::$types[$this->type];
	}

	public function getFileAttribute($value)
	{
		$year = date('Y', strtotime($this->story->created_at));
		$month = date('m', strtotime($this->story->created_at));
		return $this->getStoryMediaPath($this->story->user_id, $year, $month, $value);
	}

	public function story()
	{
		return $this->belongsTo(Story::class, 'story_id');
	}
}
