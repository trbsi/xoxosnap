<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    public function run(User $user)
    {
    	$adminRole = UserRole::where('role_key', 'admin')->first();
    	$admins = [
	    	[
	            'username' => 'dario',
	            'email' => 'dario@admin.com',
	            'password' => Hash::make('dario1991djakovo'),
	            'role_id' => $adminRole->id
	        ]
	    ];

	    foreach ($admins as $admin) {
			$user->username = $admin['username'];
			$user->email = $admin['email'];
			$user->password = $admin['password'];
			$user->role_id = $admin['role_id'];
	    	$user->save();
	    }
    }
}
