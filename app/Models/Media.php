<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Media extends Eloquent
{
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

	public function media_purchases()
	{
		return $this->hasMany(\App\Models\MediaPurchase::class, 'media_id');
	}
}
