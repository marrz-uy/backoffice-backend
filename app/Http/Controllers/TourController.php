<?php

namespace App\Http\Controllers;

use App\Models\TourArmado;
use App\Models\TourItems;
use App\Models\TourItemsPredefinido;
use App\Models\TourPredefinido;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class TourController extends Controller
{
    
    public function InsertarTourPredefinido(Request $request)
    {
        if($request->Opcion==='AltaDeTour'){
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
        if($request->Opcion==='AltaDeImagenTour'){
            if (!$request->hasFile('file')) {
                return $this->returnError(202, 'file is required');
            }
            // return response()->json([
            //         "codigo"    => "200",
            //         "respuesta" => "Se agrego imagen con exito",
            //         "idEvento" => $request->idTour
            //     ]);
            $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
                $url       = $response->getSecurePath();
            
                $tour=DB::table('tour_predefinido')
                ->where('id','=',$request->idTour)
                ->update(['imagen' => $url]);
                return response()->json([
                    "codigo"    => "200",
                    "respuesta" => "Se agrego imagen con exito",
                    "idTour" => $request->idTour
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
        if($request->Opcion==='ImagenTour'){
            $imagen = TourPredefinido::where('id','=',$request->tour_id)->get('imagen');
            return response()->json($imagen);
        }
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
    public function destroy(request $request,$id)
    {
        if($request->Opcion==='EliminarImagen'){
            $evento=DB::table('tour_predefinido')
                ->where('id','=',$id)
                ->update(['imagen'=>null]);
             return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito la Imagen",
                "idTour" => $id
            ]); 
            }
        if($request->Opcion==='EliminarTour'){
            $Tour=TourPredefinido::findOrFail($id);
            $Tour->delete();
             return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito",
                
            ]);
        }
        
    
    }
  
}
