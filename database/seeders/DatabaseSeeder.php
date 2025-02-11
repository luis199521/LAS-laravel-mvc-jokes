<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\JokesSeeder;
use Database\Seeders\UserSeeder; 
use Database\Seeders\RolesPermissionsSeeder;
use Database\Seeders\CategorySeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(JokesSeeder::class);
    }
}
