<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'User Pertama',
            'email' => 'user1@gmail.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'User Kedua',
            'email' => 'user2@gmail.com',
            'role' => 'user',
        ]);
    }
}