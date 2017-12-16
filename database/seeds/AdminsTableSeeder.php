<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('admins')->insert([
			'username' => 'usernameadmin1',
			'email' => 'admin1'.'@email.com',
			'password' => bcrypt('passwordadmin1'),
		]);
    }
}
