<?php

namespace App\Web\Users\Listeners;

use Illuminate\Auth\Events\Registered;

class CreateCoinsListener
{
    public function handle(Registered $event)
    {
        $event->user->coin()->create();
    }
}
