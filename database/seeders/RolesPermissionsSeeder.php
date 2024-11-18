<?php


/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 * RolesPermissionsSeeder
 *
 * Creates Roles Permissions.
 *
 * Filename:        RolesPermissionsSeeder.php
 * Location:        database/seeders
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    28/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the seeder
     */
    public function run()
    {
        $permissions = [
            ['name' => 'joke browse', 'guard_name' => 'web'],
            ['name' => 'joke read', 'guard_name' => 'web'],
            ['name' => 'joke add', 'guard_name' => 'web'],
            ['name' => 'joke edit', 'guard_name' => 'web'],
            ['name' => 'joke delete', 'guard_name' => 'web'],
            ['name' => 'joke restore', 'guard_name' => 'web'],
            ['name' => 'joke forceDelete', 'guard_name' => 'web'],
            ['name' => 'user browse', 'guard_name' => 'web'],
            ['name' => 'user read', 'guard_name' => 'web'],
            ['name' => 'user add', 'guard_name' => 'web'],
            ['name' => 'user edit', 'guard_name' => 'web'],
            ['name' => 'user delete', 'guard_name' => 'web'],
            ['name' => 'user forceDelete', 'guard_name' => 'web'],
            ['name' => 'user restore', 'guard_name' => 'web'],
            ['name' => 'user register', 'guard_name' => 'web'],
            ['name' => 'user login', 'guard_name' => 'web'],
            ['name' => 'user logout', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        $superUser = Role::firstOrCreate(['name' => 'Superuser', 'guard_name' => 'web']);
        $superUser->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'Administrator', 'guard_name' => 'web']);
        $admin->syncPermissions([
            'joke browse', 'joke read', 'joke add', 'joke edit', 'joke delete',
            'joke restore', 'joke forceDelete',
            'user browse', 'user read', 'user add', 'user edit', 'user delete',
            'user forceDelete', 'user restore',
            'user register', 'user login', 'user logout',
        ]);

        $staff = Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);
        $staff->syncPermissions([
            'joke browse', 'joke read', 'joke add', 'joke edit', 'joke delete',
            'joke restore', 'joke forceDelete',
            'user browse', 'user read', 'user add', 'user edit', 'user delete',
            'user forceDelete', 'user restore',
            'user register', 'user login', 'user logout',
        ]);

        $client = Role::firstOrCreate(['name' => 'Client', 'guard_name' => 'web']);
        $client->syncPermissions([
            'joke browse', 'joke read', 'joke add', 'joke edit', 'joke delete',
            'joke restore', 'joke forceDelete',
            'user register', 'user login', 'user logout',
        ]);
    }
}
