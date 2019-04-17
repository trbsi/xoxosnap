<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class RolesSeeder extends Seeder
{
    public function run(UserRole $userRole)
    {
        $roles = [
            [
                'role_key' => UserRole::ROLE_ADMIN,
                'role_description' => 'Admin role'
            ],
            [
                'role_key' => UserRole::ROLE_USER,
                'role_description' => 'User role'
            ]
        ];

        foreach ($roles as $role) {
            $userRole->create($role);
        }
    }
}
