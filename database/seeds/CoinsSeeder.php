<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class CoinsSeeder extends Seeder
{
    public function run(User $user)
    {
        foreach ($user->get() as $singleUser) {
            $singleUser->coin()->create([
                'coins' => rand(50, 2000),
            ]);
        }
    }
}
