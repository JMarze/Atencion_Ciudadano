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
        DB::table('users')->insert([
            'name' => 'J. Marcelo Arze',
            'username' => 'JMarze',
            'email' => 'arze.jesus@gmail.com',
            'type' => 'admin',
            'password' => bcrypt('123456'),

            'unidad_organizacional_id' => 1,
        ]);
    }
}
