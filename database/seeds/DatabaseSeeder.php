<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UsersSeeder::class);
        $this->call(UserVerificationsSeeder::class);
        $this->call(HashtagsSeeder::class);
        $this->call(MediaSeeder::class);
    	$this->call(MediaPurchasesSeeder::class);
    	$this->call(CoinsSeeder::class);
        $this->call(NotificationsSeeder::class);
        $this->call(NotificationsCountsSeeder::class);
        $this->call(StoriesSeeder::class);
        $this->call(FollowersSeeder::class);
    }
}
