<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    Permission::create(['name' => 'edit users']);
    Permission::create(['name' => 'delete users']);
    $role = Role::create(['name' => 'user']);
    $role->givePermissionTo('edit users');
    $role->givePermissionTo('delete users');

    }
}
