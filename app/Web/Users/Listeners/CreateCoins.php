<?php

namespace App\Web\Users\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class CreateCoins
{
    public function handle(Registered $event)
    {
        $event->user->coin()->create();
    }
}
