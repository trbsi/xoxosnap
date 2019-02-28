<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Coin extends Eloquent
{
	protected $table = 'coins';

	protected $casts = [
		'user_id' => 'int',
		'coins' => 'int'
	];

	protected $fillable = [
		'user_id',
		'coins'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
