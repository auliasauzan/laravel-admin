<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'  => 'Superadmin',
                'email' => 'superadmin@gmail.com',
                'role'  => 'Superadmin'
            ],
            [
                'name'  => 'Admin',
                'email' => 'admin@gmail.com',
                'role'  => 'Admin'
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name'              => $user['name'],
                'email'             => $user['email'],
                'role'              => $user['role'],
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }
    }
}