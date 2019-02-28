<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Story extends Eloquent
{
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
}
