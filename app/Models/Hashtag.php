<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class Hashtag extends Model
{
	protected $casts = [
		'popularity' => 'int'
	];

	protected $fillable = [
		'name',
		'popularity'
	];

	public function media_hashtags()
	{
		return $this->belongsToMany(Media::class, 'media_hashtags', 'hashtag_id', 'media_id');
	}
}
