<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'username' => 'trungpv',
          'name' => 'Phạm Văn Trung',
          'email' => 'mail@email.com',
          'password' => bcrypt('secret'),
          'last_online_at' => Carbon::now(),
       ]);
    }
}
