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

	protected $appends = [
		'hashtag_name'
	];

	public function getHashtagNameAttribute() 
	{
		return '#'.$this->name;
	}

	public function media_hashtags()
	{
		return $this->belongsToMany(Media::class, 'media_hashtags', 'hashtag_id', 'media_id');
	}
}
