<?php

namespace Database\Seeders;

use Database\Seeders\ActividadesInfantilesCsvSeeder;
use Database\Seeders\ActividadesNocturnasCsvSeeder;
use Database\Seeders\AlojamientosCsvSeeder;
use Database\Seeders\EspectaculosCsvSeeder;
use Database\Seeders\GastronomicosCsvSeeder;
use Database\Seeders\PaseosCsvSeeder;
use Database\Seeders\ServiciosEsencialesCsvSeeder;
use Database\Seeders\TranslationSeeder;
use Database\Seeders\TransportesCsvSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //? REAL SEEDERS
        $this->call([
            TranslationSeeder::class, // tabla 1
            TransportesCsvSeeder::class, // tabla 2 ok
            GastronomicosCsvSeeder::class, // tabla 3 ok
            AlojamientosCsvSeeder::class, // tabla 4 ok
            ActividadesInfantilesCsvSeeder::class, // tabla 5 ok
            ActividadesNocturnasCsvSeeder::class, // tabla 6 ok
            EspectaculosCsvSeeder::class, // tabla 7 ok
            ServiciosEsencialesCsvSeeder::class, // tabla 8 ok
            PaseosCsvSeeder::class, // tabla 9 ok
            EventosCsvSeeder::class, // tabal 10 ok
        ]);

        //? FAKER SEEDERS
        // $this->call([
        //     TranslationSeeder::class,
        //     TransportesSeeder::class,
        //     GastronomicosSeeder::class,
        //     AlojamientosSeeder::class,
        //     ServiciosEsencialesSeeder::class,
        //     EspectaculosSeeder::class,
        //     ActividadesInfantilesSeeder::class,
        //     ActividadesNocturnasSeeder::class,
        //     PaseosSeeder::class,
        //     EventosSeeder::class,
        // ]);

    }
}