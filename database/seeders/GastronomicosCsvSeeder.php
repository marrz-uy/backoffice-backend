<?php

namespace Database\Seeders;

use App\Models\Gastronomicos;
use App\Models\PuntosInteres;
use App\Models\Telefonos;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GastronomicosCsvSeeder extends Seeder
{
    public function run()
    {
        $faker    = Factory::create();
        $csvData  = fopen(base_path('database/csv/gastronomicos.csv'), 'r');
        $transRow = true;
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($csvData, 555, ',')) !== false) {
                if (!$transRow) {
                    $gastronomicos = PuntosInteres::create([
                        'Nombre'            => $data['0'],
                        'Departamento'      => $data['1'],
                        'Ciudad'            => $data['2'],
                        'Direccion'         => $data['3'],
                        'HoraDeApertura'    => $data['4'],
                        'HoraDeCierre'      => $data['5'],
                        'Facebook'          => $data['6'],
                        'Instagram'         => $data['7'],
                        'Web'               => $data['8'],
                        'Descripcion'       => $data['9'],
                        'Latitud'           => $data['10'],
                        'Longitud'          => $data['11'],
                        'TipoDeLugar'       => $data['12'],
                        'RestriccionDeEdad' => $data['13'],
                        'EnfoqueDePersonas' => $data['14'],
                        'Megusta'           => $data['15'],
                    ]);

                    $gastronomicos->save();
                    $gastronomicos->id;

                    Gastronomicos::create([
                        'puntosinteres_id' => $gastronomicos->id,
                        'ComidaVegge'      => $data['16'],
                        'Especialidad'     => $data['17'],
                        'Alcohol'          => $data['18'],
                        'MenuInfantil'     => $data['19'],
                        'Tipo'             => $data['20'],
                    ]);

                    Telefonos::create([
                        'puntosinteres_id' => $gastronomicos->id,
                        'Telefono'         => $data['21'],
                    ]);
                }
                $transRow = false;
            }
            fclose($csvData);
            DB::commit();
        } catch (\Exception$e) {
            DB::rollBack();
            return response()->json([
                'Message' => 'No se pudieron ingresar datos de gastronomicos.csv',
            ]);
        }
    }
}