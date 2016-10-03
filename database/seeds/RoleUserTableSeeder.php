<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;
use App\Entities\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::find(1);
        $user = User::find(1);

        $user->attachRole($role);
    }
}
