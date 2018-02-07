<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
				  array('id' => '1','name' => 'admin', 'ape' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123456'), 'status' => '1', 'perfil' => '1'),
				  array('id' => '2','name' => 'aura', 'ape' => 'dominguez', 'email' => 'aura@gmail.com', 'password' => bcrypt('123456'), 'status' => '1', 'perfil' => '2'),
				  array('id' => '3','name' => 'carlos', 'ape' => 'hurtado', 'email' => 'carlos@gmail.com', 'password' => bcrypt('123456'), 'status' => '1', 'perfil' => '2'),
				  array('id' => '4','name' => 'jose', 'ape' => 'rodriguez', 'email' => 'jose@gmail.com', 'password' => bcrypt('123456'), 'status' => '1', 'perfil' => '2'),
				  array('id' => '5','name' => 'jesus', 'ape' => 'gonsalez', 'email' => 'jesus@gmail.com', 'password' => bcrypt('123456'), 'status' => '1', 'perfil' => '2')
				);
        //insert manual a una base de datos con array
        \DB::table('users')->insert($users);
    }
}
