<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class NotificationsCountsSeeder extends Seeder
{
    public function run(User $user)
    {
        if ('production' === env('APP_ENV')) {
            return;
        }

        foreach ($user->get() as $singleUser) {
            $singleUser->notificationCount()->create();
        }
    }
}
