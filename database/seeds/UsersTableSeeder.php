<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('users')->insert([
			'username' => 'usernameuser1',
			'email' => 'user1'.'@email.com',
			'password' => bcrypt('passworduser1'),
		]);
    }
}
