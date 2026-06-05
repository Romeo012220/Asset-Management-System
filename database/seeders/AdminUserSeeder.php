<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admintest@gmail.com',
            ],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
                'branch' => 'Head Office',
            ]
        );
    }
}