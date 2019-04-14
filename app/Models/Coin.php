<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Traits\NumberFormatterTrait;

class Coin extends Model
{
    public const COIN_COST = 10; //10 coins = 1$

    use NumberFormatterTrait;

    public $noMutation = false;

    protected $table = 'coins';

    protected $casts = [
        'user_id' => 'int',
        'current_coins' => 'int',
        'total_coins' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'current_coins',
        'total_coins',
    ];

    protected $appends = [
        'current_coins_formatted',
    ];

    public function getCurrentCoinsFormattedAttribute()
    {
        return $this->formatNumber($this->current_coins);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
