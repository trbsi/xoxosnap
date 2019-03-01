<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Media extends Model
{
	public const MEDIA_PATH = '/user/media/';

	protected $table = 'media';

	protected $casts = [
		'user_id' => 'int',
		'cost' => 'int',
		'likes' => 'int'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'user_id',
		'title',
		'description',
		'file',
		'cost',
		'expires_at',
		'likes'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function media_likes()
	{
		return $this->hasMany(\App\Models\MediaLike::class, 'media_id');
	}

	public function purchases()
	{
		return $this->belongsToMany(User::class, 'media_purchases', 'media_id', 'user_id');
	}
}
