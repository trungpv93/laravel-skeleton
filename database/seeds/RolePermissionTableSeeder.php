<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;
use App\Entities\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::find(1);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $role->attachPermission($permission);
        }
    }
}
