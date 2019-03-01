<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoinTransaction extends Model
{
	protected $table = 'coins_transactions';

	protected $casts = [
		'sender_id' => 'int',
		'receiver_id' => 'int',
		'coins' => 'int'
	];

	protected $fillable = [
		'sender_id',
		'receiver_id',
		'coins'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'sender_id');
	}
}
