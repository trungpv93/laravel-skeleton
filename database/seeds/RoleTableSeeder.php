<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
                 [
                   'name' => 'admin',
                   'display_name' => 'Administrator',
                   'description' => 'Administrator',
                 ],
                 [
                   'name' => 'user',
                   'display_name' => 'User',
                   'description' => 'User',
                 ],
      ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
