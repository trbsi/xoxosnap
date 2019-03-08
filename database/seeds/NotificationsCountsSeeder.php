<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class NotificationsCountsSeeder extends Seeder
{
    public function run(User $user)
    {
        foreach ($user->get() as $singleUser) {
            $singleUser->notificationCount()->create();
        }
    }
}
