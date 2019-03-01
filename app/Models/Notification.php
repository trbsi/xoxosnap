<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	public const TYPE_PERFORMER_NEW_FOLLOWER = 1;
	public const TYPE_PERFORMER_NEW_PURCHASE = 2;
	public const TYPE_VIEWER_PERFORMER_POSTED = 3;

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
