<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        
        $permissions = ['view', 'create', 'edit', 'delete'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        
        $admin = Role::findOrCreate('admin');
        $driver = Role::findOrCreate('driver');
        $removalist = Role::findOrCreate('removalist');
        $customer = Role::findOrCreate('customer');

       
        $admin->syncPermissions($permissions);
        $driver->syncPermissions(['view', 'edit', 'create']);
        $removalist->syncPermissions(['view', 'edit']);
        $customer->syncPermissions(['view']);

        if($user = User::find(1)) $user->assignRole('admin');
        if($user = User::find(2)) $user->assignRole('driver');
        if($user = User::find(3)) $user->assignRole('removalist');
        if($user = User::find(4)) $user->assignRole('customer');
    }
}
