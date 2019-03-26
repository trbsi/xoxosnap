<?php

namespace App\Web\Users\Resources\Verifications\Listeners;

use Illuminate\Auth\Events\Registered;

class CreateVerificationNumberListener
{
    public function handle(Registered $event)
    {
        $user = $event->user;
        $user->verification()->create([
            'number' => sprintf('%s-%s', $user->id, rand(10000, 99999))
        ]);
    }
}
