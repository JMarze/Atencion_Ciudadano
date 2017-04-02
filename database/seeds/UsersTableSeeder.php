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

        DB::table('users')->insert([
            'name' => 'Técnico',
            'username' => 'Tec',
            'email' => 'tecnico@gmail.com',
            'type' => 'tecnico',
            'password' => bcrypt('123456'),

            'unidad_organizacional_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Jefe',
            'username' => 'Jefe',
            'email' => 'jefe@gmail.com',
            'type' => 'jefe',
            'password' => bcrypt('123456'),

            'unidad_organizacional_id' => 1,
        ]);
    }
}
