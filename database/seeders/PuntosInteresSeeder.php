<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PuntosInteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($c = 0;$c<20;$c++){
            DB::table('puntosinteres')->insert([
                'Nombre'       => 'Circo ' . $faker->city,
                'Departamento' => $faker->state,
                'Ciudad'       => $faker->randomElement(['Montevideo','Canelones', 'San Jose']),
                'Direccion'    => $faker->address,
                'HoraDeApertura' => $faker->randomElement(['08:00:00','10:00:00', '12:00:00','14:00:00']),
                'HoraDeCierre' => $faker->randomElement(['16:00:00','18:00:00', '20:00:00','22:00:00']),
                'Facebook' => 'https://www.facebook.com/' . 'Circo ' . $c,
                'Instagram' => 'https://www.instagram.com/' . 'Circo ' . $c,
                'Web' => 'https://www.google.com/',
                'Descripcion'  => $faker->text($maxNbChars = 200),
                'Imagen'       => $faker->imageUrl($width = 640, $height = 480),
                'Latitud'        => rand(3474990, 3493590),
                'Longitud'       => rand(5583360, 5633330),
                'TipoDeLugar' => $faker->randomElement(['Espacio cerrado','Al aire libre','Ambos']),
                'RestriccionDeEdad' => $faker->randomElement(['Todas','Mayores']),
                'EnfoqueDePersonas' => $faker->randomElement(['Grupo','Familia','Pareja']),
            ]);
            
        }
        
}
}