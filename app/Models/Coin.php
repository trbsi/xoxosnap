<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Traits\NumberFormatterTrait;

class Coin extends Model
{
	use NumberFormatterTrait;

	protected $table = 'coins';

	protected $casts = [
		'user_id' => 'int',
		'coins' => 'int'
	];

	protected $fillable = [
		'user_id',
		'coins'
	];

	protected $appends = [
		'coins_formatted'
	];

	public function getCoinsFormattedAttribute()
	{
		return $this->formatNumber($this->coins);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
