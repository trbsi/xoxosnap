<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
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
