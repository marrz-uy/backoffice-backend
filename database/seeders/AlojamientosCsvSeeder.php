<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Telefonos;
use App\Models\Alojamiento;
use App\Models\PuntosInteres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlojamientosCsvSeeder extends Seeder
{
    public function run()
    {
        $faker    = Factory::create();
        $csvData  = fopen(base_path('database/csv/alojamientos.csv'), 'r');
        $transRow = true;
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($csvData, 0, ',')) !== false) {
                if (!$transRow) {
                    $alojamientos = PuntosInteres::create([
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
                    $alojamientos->save();
                    $alojamientos->id;

                    Alojamiento::create([
                        'puntosinteres_id'  => $alojamientos->id,
                        'Tipo'              => $data['16'],
                        'Calificaciones'    => $data['17'],
                        'TvCable'           => $data['18'],
                        'Piscina'           => $data['19'],
                        'Wifi'              => $data['20'],
                        'AireAcondicionado' => $data['21'],
                        'BanoPrivado'       => $data['22'],
                        'Casino'            => $data['23'],
                        'Bar'               => $data['24'],
                        'Restaurante'       => $data['25'],
                        'Desayuno'          => $data['26'],
                        'Mascota'           => $data['27'],
                    ]);

                    Telefonos::create([
                        'puntosinteres_id' => $alojamientos->id,
                        'Telefono'         => $data['28'],
                    ]);
                }
                $transRow = false;
            }
            fclose($csvData);
            DB::commit();
        } catch (\Exception$e) {
            DB::rollBack();
            return response()->json([
                'Message' => 'No se pudieron ingresar datos de alojamiento.csv' . $e,
            ]);
        }
    }
}