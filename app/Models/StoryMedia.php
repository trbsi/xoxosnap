<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class StoryMedia extends Eloquent
{
	protected $table = 'stories_media';

	protected $casts = [
		'story_id' => 'int'
	];

	protected $fillable = [
		'story_id',
		'file'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'story_id');
	}
}
