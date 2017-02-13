<?php

use Illuminate\Database\Seeder;

class UnidadesOrganizacionalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades_organizacionales')->insert([
            'nombre' => 'Sistemas',
        ]);
    }
}
