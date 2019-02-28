<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Notification extends Eloquent
{
	protected $table = 'notifications';

	protected $casts = [
		'user_id' => 'int',
		'notification_type' => 'int',
		'by_user_id' => 'int',
		'is_read' => 'boolean'
	];

	protected $fillable = [
		'user_id',
		'notification_type',
		'by_user_id',
		'content',
		'is_read'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
