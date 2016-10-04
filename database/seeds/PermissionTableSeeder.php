<?php

use Illuminate\Database\Seeder;
use App\Entities\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permission = [
                   [
                     'name' => 'role-list',
                     'display_name' => 'Display Role Listing',
                     'description' => 'See only Listing Of Role',
                   ],
                   [
                     'name' => 'role-create',
                     'display_name' => 'Create Role',
                     'description' => 'Create New Role',
                   ],
                   [
                     'name' => 'role-edit',
                     'display_name' => 'Edit Role',
                     'description' => 'Edit Role',
                   ],
                   [
                     'name' => 'role-delete',
                     'display_name' => 'Delete Role',
                     'description' => 'Delete Role',
                   ],

                   [
                     'name' => 'permission-list',
                     'display_name' => 'Display Permission Listing',
                     'description' => 'See only Listing Of Permission',
                   ],
                   [
                     'name' => 'permission-create',
                     'display_name' => 'Create Permission',
                     'description' => 'Create New Permission',
                   ],
                   [
                     'name' => 'permission-edit',
                     'display_name' => 'Edit Permission',
                     'description' => 'Edit Permission',
                   ],
                   [
                     'name' => 'permission-delete',
                     'display_name' => 'Delete Permission',
                     'description' => 'Delete Permission',
                   ],

                   [
                     'name' => 'user-list',
                     'display_name' => 'Display User Listing',
                     'description' => 'See only Listing Of User',
                   ],
                   [
                     'name' => 'user-create',
                     'display_name' => 'Create User',
                     'description' => 'Create New User',
                   ],
                   [
                     'name' => 'user-edit',
                     'display_name' => 'Edit User',
                     'description' => 'Edit User',
                   ],
                   [
                     'name' => 'user-delete',
                     'display_name' => 'Delete User',
                     'description' => 'Delete User',
                   ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
