<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ActividadesInfantilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($c = 1;$c<21;$c++){
            DB::table('actividades_infantiles')->insert([
                            'puntosinteres_id' => $c,
                            'Tipo'             => 'Circo',
                        ]);
        }
}
}