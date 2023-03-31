<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Telefonos;
use App\Models\Espectaculos;
use App\Models\PuntosInteres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspectaculosCsvSeeder extends Seeder
{
    public function run()
    {
        $faker    = Factory::create();
        $csvData  = fopen(base_path('database/csv/espectaculos.csv'), 'r');
        $transRow = true;
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($csvData, 555, ',')) !== false) {
                if (!$transRow) {
                    $espectaculos = PuntosInteres::create([
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
                    
                    $espectaculos->save();
                    $espectaculos->id;

                    Espectaculos::create([
                        'puntosinteres_id' => $espectaculos->id,
                        'Tipo'             => $data['16'],
                    ]);

                    Telefonos::create([
                        'puntosinteres_id' => $espectaculos->id,
                        'Telefono'         => $data['17'],
                    ]);
                }
                $transRow = false;
            }
            fclose($csvData);
            DB::commit();
        } catch (\Exception$e) {
            DB::rollBack();
            return response()->json([
                'Message' => 'No se pudieron ingresar datos de espectaculos.csv '.$e,
            ]);
        }
    }
}