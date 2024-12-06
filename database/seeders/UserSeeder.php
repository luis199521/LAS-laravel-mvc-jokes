<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
       $user =  User::create([
            'given_name' => 'Test',
            'nickname' => 'TestUser',
            'family_name' => 'User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'), 
        ]);

        $user->assignRole('Superuser');
    }
}