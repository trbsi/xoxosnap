<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    public function run(UserRole $userRole)
    {
        $adminRole = UserRole::where('role_key', 'admin')->first();
        $roles = [
            [
                'role_key' => 'admin',
                'role_description' => 'Admin role'
            ]
        ];

        foreach ($roles as $role) {
            $userRole->create($role);
        }
    }
}
