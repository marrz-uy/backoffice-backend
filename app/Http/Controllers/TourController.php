<?php

namespace App\Http\Controllers;

use App\Models\TourArmado;
use App\Models\TourItems;
use App\Models\TourItemsPredefinido;
use App\Models\TourPredefinido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function InsertarTourArmado(Request $request)
    {

        try {
            DB::beginTransaction();
            $tour = TourArmado::create([
                'usuarioId'      => $request->usuarioId,
                'nombreTour'     => $request->nombreTour,
                'horaInicioTour' => $request->horaInicioTour,
            ]);

            $puntosdeInteresTour = $request->puntosdeInteresTour;
            $puntos              = explode(',', $puntosdeInteresTour);
            $id                  = $tour->id;
            foreach ($puntos as $punto) {
                TourItems::create([
                    'puntoInteresId' => $punto,
                    'tourId'         => $id,
                ]);
            }
            DB::commit();
            return response()->json([
                'Message' => 'Tour Creado correctamente ' . $tour->nombreTour,
            ]);

        } catch (\Exception$e) {
            DB::rollBack();

            return response()->json([
                'Message' => 'No se pudo crear el tour, revise los datos enviados',
            ]);
        }

    }

    public function InsertarTourPredefinido(Request $request)
    {
        try {
            DB::beginTransaction();
            $tour = TourPredefinido::create([
                'nombreTourPredefinido'       => $request->nombreTourPredefinido,
                'horaDeInicioTourPredefinido' => $request->horaDeInicioTourPredefinido,
                'descripcionTourPredefinido'  => $request->descripcionTourPredefinido,
            ]);

            $puntosdeInteresTour = $request->puntosdeInteresTour;
            $puntos              = explode(',', $puntosdeInteresTour);
            $id                  = $tour->id;
            foreach ($puntos as $punto) {
                TourItemsPredefinido::create([
                    'puntoInteresId' => $punto,
                    'tourId'         => $id,
                ]);
            }
            DB::commit();
            return response()->json([
                'Message' => 'Tour Predefinido Creado correctamente ' . $tour->nombreTourPredefinido,
            ]);

        } catch (\Exception$e) {
            DB::rollBack();

            return response()->json([
                'Message' => 'No se pudo crear el tour predefinido, revise los datos enviados',
            ]);
        }

    }

    public function ListarToursArmados($id)
    {
        $tourArmados = TourArmado::with('TourItems.PuntosInteres')
            ->where('usuarioId', $id)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            $tourArmados,
        ]);

    }

    public function ListarToursPredefinidos()
    {
        $toursPredefinidos = TourPredefinido::with('TourItems.PuntosInteres')
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            $toursPredefinidos,
        ]);

    }

}
