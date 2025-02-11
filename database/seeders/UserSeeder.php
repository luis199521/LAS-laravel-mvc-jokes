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

          
          $admin = User::create([
            'given_name' => 'Admin',
            'nickname' => 'AdminUser',
            'family_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), 
        ]);
        $admin->assignRole('Administrator');

    
        $staff = User::create([
            'given_name' => 'Staff',
            'nickname' => 'StaffUser',
            'family_name' => 'User',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'), 
        ]);
        $staff->assignRole('Staff');

      
        $client = User::create([
            'given_name' => 'Client',
            'nickname' => 'ClientUser',
            'family_name' => 'User',
            'email' => 'client@example.com',
            'password' => bcrypt('password'), 
        ]);
        $client->assignRole('Client');



    }
}