<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $clientPermissions = [
            'order_access',
            'order_create',
        ];

        $adminPermissions = [
            'order_access',
            'order_manage',
            'category_manage',
            'plan_manage',
            'features_manage',
            'portfolio_manage',
            'contactus_manage',
        ];

        $allPermission = array_unique(array_merge($clientPermissions, $adminPermissions));

        foreach ($allPermission as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create(['name' => 'admin']);
        foreach ($adminPermissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'client']);
        foreach ($clientPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
