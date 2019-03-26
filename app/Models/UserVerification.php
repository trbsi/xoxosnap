<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
	public const STATUS_IN_PROGRESS = 1;
	public const STATUS_VERIFIED = 2;
	public const STATUS_UNVERIFIED = 0;

	public $timestamps = false;
    protected $table = 'users_verifications';

	protected $casts = [
		'user_id' => 'int',
        'status' => 'int',
 	];

	protected $fillable = [
		'user_id',
		'number',
        'status',
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
