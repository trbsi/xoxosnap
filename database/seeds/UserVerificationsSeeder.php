<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserVerificationsSeeder extends Seeder
{
    public function run(User $user)
    {
    	if ('production' === env('APP_ENV')) {
            return;
        }
        
    	$users = $user->get();
        foreach ($users as $user) {
            $user->verification()->create([
                'number' => sprintf('%s-%s', $user->id, 22222)
            ]);
        }
    }

}
