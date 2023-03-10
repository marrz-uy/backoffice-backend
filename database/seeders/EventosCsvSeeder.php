<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EventosCsvSeeder extends Seeder
{
    public function run()
    {
        $faker    = Factory::create();
        $csvData  = fopen(base_path('database/csv/eventos.csv'), 'r');
        $transRow = true;

        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Eventos::create([
                    'puntosinteres_id'       => $data['0'],
                    'NombreEvento'           => $data['1'],
                    'LugarDeVentaDeEntradas' => $data['2'],
                    'FechaInicio'            => $data['3'],
                    'FechaFin'               => $data['4'],
                    'HoraInicio'             => $data['5'],
                    'HoraFin'                => $data['6'],
                    'TipoEvento'             => $data['7'],
                    'ImagenEvento'           => $data['8'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);

        return response()->json([
            'Message' => 'No se pudieron ingresar datos de eventos.csv',
        ]);

    }
}