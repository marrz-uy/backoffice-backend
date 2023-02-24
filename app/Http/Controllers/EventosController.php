<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use App\Models\Telefonos;
use App\Models\Espectaculos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class EventosController extends Controller
{
   
    public function index()
    {
        //
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $evento=new Eventos();
        $evento->puntosinteres_id=$request->LugarDelEvento;
        $evento->NombreEvento=$request->NombreEvento;
        $evento->LugarDeVentaDeEntradas=$request->LugarDeVentaDeEntradas;
        $evento->FechaInicio=$request->FechaInicio;
        $evento->FechaFin=$request->FechaFin;
        $evento->HoraInicio=$request->HoraInicio;
        $evento->HoraFin=$request->HoraFin;
        $evento->TipoEvento=$request->TipoDeEvento;
        $evento->save();
        return response() ->json(['codigo'=>'200',"respuesta"=>'Se registro el evento correctamente']);
    }

    
    public function show(Request $request)
    {
        if($request->Opcion==='Unico'){
            $evento=DB::table('eventos')
            ->where('Eventos_id','=',$request->Eventos_id)
            ->get();
            return response() ->json($evento);
        }
        if($request->Opcion==='Eventoypunto'){
            $eventopunto = DB::table('puntosinteres')
            ->Join('eventos','puntosinteres.id','=','puntosinteres_id')
            //->where('puntosinteres.id','=',$request->id)
            ->paginate(10);
            return response()->json($eventopunto);
        }
        $eventos=Eventos::paginate(10);
        return response() ->json($eventos);
    }

  
    public function edit(Eventos $eventos)
    {
        //
    }

    public function update(Request $request,$idEvento)
    {
        
        $evento=DB::table('eventos')
            ->where('Eventos_id','=',$idEvento)
            ->update([
                'puntosinteres_id' => $request->LugarDelEvento,
                'NombreEvento' => $request->NombreEvento,
                'LugarDeVentaDeEntradas' => $request->LugarDeVentaDeEntradas,
                'FechaInicio' => $request->FechaInicio,
                'FechaFin' => $request->FechaFin,
                'HoraInicio' => $request->HoraInicio,
                'HoraFin' => $request->HoraFin,
                'TipoEvento' =>$request->TipoDeEvento
            ]);

        return response()->json([
            "codigo"    => '200',
            "respuesta" => "Se modifico con exito",
        ]);
    }

    
    public function destroy($id)
    {
        $evento=Eventos::findOrFail($id);
        $evento->delete();
         return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
        ]);
    }
}
