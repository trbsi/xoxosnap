<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StoryMedia;

class Story extends Model
{
	public const STORY_PATH = '/user/stories/';

	protected $table = 'stories';

	protected $casts = [
		'user_id' => 'int',
		'cost' => 'int'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'user_id',
		'cost',
		'expires_at'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function media()
    {
        return $this->hasMany(StoryMedia::class, 'story_id');
    }
}
