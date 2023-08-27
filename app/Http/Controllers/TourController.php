<?php

namespace App\Http\Controllers;

use App\Models\TourArmado;
use App\Models\TourItemsPredefinido;
use App\Models\TourPredefinido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{

    public function InsertarTourPredefinido(Request $request)
    {
        $nombre      = $request->nombreTourPredefinido;
        $hora        = $request->horaDeInicioTourPredefinido;
        $descripcion = $request->descripcionTourPredefinido;
        $imagen      = $request->imagenTour;
        $puntosTour  = $request->puntosdeInteresTour;

        try {
            DB::beginTransaction();
            $tour                              = new TourPredefinido();
            $tour->nombreTourPredefinido       = $nombre;
            $tour->horaDeInicioTourPredefinido = $hora;
            $tour->descripcionTourPredefinido  = $descripcion;
            $tour->imagenTour                  = $imagen;
            $tour->save();

            $puntosdeInteresTour = $puntosTour;
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
                'Message' => 'Tour Predefinido Creado correctamente',
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'Message' => 'No se pudo crear el tour predefinido, revise los datos enviados' . $e,
            ], 404);
        }
    }
    public function ModificarTourPredefinido(Request $request)
    {
        $TourPredenfinido                              = TourPredefinido::find($request->id);
        $TourPredenfinido->nombreTourPredefinido       = $request->nombreTourPredefinido;
        $TourPredenfinido->horaDeInicioTourPredefinido = $request->horaDeInicioTourPredefinido;
        $TourPredenfinido->descripcionTourPredefinido  = $request->descripcionTourPredefinido;
        $TourPredenfinido->imagenTour                  = $request->imagenTour;
        $TourPredenfinido->save();

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
        if ($request->Opcion === 'ImagenTour') {
            $imagen = TourPredefinido::where('id', '=', $request->tour_id)->get('imagen');
            return response()->json($imagen);
        }
        if ($request->Opcion === 'Unico') {
            $toursPredefinidos = TourPredefinido::with('TourItems.PuntosInteres')->get()->find($request->id);

            return response()->json([
                $toursPredefinidos,
            ]);
        }
        if ($request->Opcion === 'BusquedaPorNombre') {

            $tour = DB::table('tour_predefinido')
                ->where('nombreTourPredefinido', 'like', "$request->Nombre")
                ->get();
            if ($tour->isEmpty()) {
                return response()->json(['Mensaje' => 'No hubo resultado']);
            }

            return response()->json($tour);
        }
        $toursPredefinidos = TourPredefinido::with('TourItems.PuntosInteres')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return response()->json([
            $toursPredefinidos,
        ]);

    }
    public function destroy(request $request, $id)
    {
        if ($request->Opcion === 'EliminarImagen') {
            $evento = DB::table('tour_predefinido')
                ->where('id', '=', $id)
                ->update(['imagen' => null]);
            return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito la Imagen",
                "idTour"    => $id,
            ]);
        }
        if ($request->Opcion === 'EliminarTour') {
            $Tour = TourPredefinido::findOrFail($id);
            $Tour->delete();
            return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito",

            ]);
        }

    }

}
