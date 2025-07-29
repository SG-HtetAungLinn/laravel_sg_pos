<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '09123465',
                'gender' => 'male',
                'address' => 'Yangon',
                'role' => 'admin',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '09123465',
                'gender' => 'male',
                'address' => 'Yangon',
                'role' => 'user',
                'password' => Hash::make('password')
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
        User::factory(100)->create();
    }
}
