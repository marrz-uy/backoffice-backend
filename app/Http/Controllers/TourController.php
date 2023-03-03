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
    public function ModificarTourPredefinido(Request $request){
        $TourPredenifido=TourPredefinido::find($request->id);
        $TourPredenifido->nombreTourPredefinido          = $request->nombreTourPredefinido;
        $TourPredenifido->horaDeInicioTourPredefinido    = $request->horaDeInicioTourPredefinido;
        $TourPredenifido->descripcionTourPredefinido     = $request->descripcionTourPredefinido;
        $TourPredenifido->save();
        
        DB::table('tour_items_predefinido')->where('tourId', $request->id)->delete();
        $puntosdeInteresTour = $request->puntosdeInteresTour;
            $puntos              = explode(',', $puntosdeInteresTour);
            $id                  = $request->id;
            foreach ($puntos as $punto) {
                TourItemsPredefinido::create([
                    'puntoInteresId' => $punto,
                    'tourId'         => $id,
                ]);
            }
        

        return response()->json([
            'Message' => 'Se modifico con exito',
        ]);
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

    public function ListarToursPredefinidos(Request $request)
    {
        if($request->Opcion==='Unico'){
            $toursPredefinidos=TourPredefinido::with('TourItems.PuntosInteres')->get()->find($request->id);
            
            return response()->json([
                $toursPredefinidos,
            ]);
        }
        if($request->Opcion==='BusquedaPorNombre'){
           
            $tour=DB::table('tour_predefinido')
            ->where('nombreTourPredefinido', 'like',"$request->Nombre")
            ->get();
                if ($tour->isEmpty())return response()->json(['Mensaje'=>'No hubo resultado']);;
            return response()->json($tour);
        }
        $toursPredefinidos = TourPredefinido::with('TourItems.PuntosInteres')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return response()->json([
            $toursPredefinidos,
        ]);

    }
    public function destroy($id)
    {
        $Tour=TourPredefinido::findOrFail($id);
        $Tour->delete();
         return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
            
        ]);
    
    }
}
