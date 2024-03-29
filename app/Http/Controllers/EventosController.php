<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eventos;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class EventosController extends Controller
{
    public function ImagenesEventos()
    {
        return response()->json([
            "codigo"    => "FUNCA",
            "respuesta" => "Se elimino con exito",
        ]);
        $imagen = Eventos::where('Eventos_id', '=', $evento_id)->get('ImagenEvento');
        return response()->json($imagen);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NombreEvento'           => 'required',
            'NombreEvento'           => 'string',
            'LugarDeVentaDeEntradas' => 'required',
            'FechaInicio'            => 'required',
            'FechaInicio'            => 'date',
            'FechaFin'               => 'required',
            'FechaFin'               => 'date',
            'HoraInicio'             => 'required',
            'TipoEvento'             => 'required',
            'TipoEvento'             => 'string',
        ], [
            'NombreEvento.required'           => 'El nombre es obligatorio',
            'NombreEvento.string'             => 'El nombre no pueden ser numeros',
            'LugarDeVentaDeEntradas.required' => 'Indicar donde se venden las entradas es obligatorio',
            'FechaInicio.required'            => 'La fecha de inicio es obligatorio',
            'FechaInicio.date'                => 'Se debe ingresar en formato fecha: aaaa-mm-dd',
            'FechaFin.required'               => 'La fecha de cuando finaliza es obligatorio',
            'FechaFin.date'                   => 'Se debe ingresar en formato fecha: aaaa-mm-dd',
            'HoraInicio.required'             => 'La hora de inicio es obligatoria',
            'TipoEvento.required'             => 'Indicar el tipo de evento es obligatorio',
            'TipoEvento.string'               => 'El tipo de evento no pueden ser numeros',
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $evento                         = new Eventos();
        $evento->puntosinteres_id       = $request->LugarDelEvento;
        $evento->NombreEvento           = $request->NombreEvento;
        $evento->LugarDeVentaDeEntradas = $request->LugarDeVentaDeEntradas;
        $evento->FechaInicio            = $request->FechaInicio;
        $evento->FechaFin               = $request->FechaFin;
        $evento->HoraInicio             = $request->HoraInicio;
        $evento->HoraFin                = $request->HoraFin;
        $evento->TipoEvento             = $request->TipoEvento;
        // faltaba imagen
        $evento->ImagenEvento = $request->ImagenEvento;
        $evento->save();
        return response()->json(['codigo' => '200', "respuesta" => 'Se registro el evento correctamente']);
    }

    public function show(Request $request)
    {
        if ($request->Opcion === 'ImagenEvento') {
            $imagen = Eventos::where('Eventos_id', '=', $request->evento_id)->get('ImagenEvento');
            return response()->json($imagen);
        }
        if ($request->Opcion === 'Unico') {
            $evento = DB::table('eventos')
                ->where('Eventos_id', '=', $request->Eventos_id)
                ->get();
            return response()->json($evento);
        }
        if ($request->Opcion === 'BusquedaPorNombre') {

            $evento = DB::table('eventos')
                ->where('NombreEvento', 'like', "%" . $request->Nombre . "%")
                ->get();
            if ($evento->isEmpty()) {
                return response()->json(['Mensaje' => 'No hubo resultado']);
            }

            return response()->json($evento);
        }
        if ($request->Opcion === 'Eventoypunto') {
            $eventopunto = DB::table('puntosinteres')
                ->Join('eventos', 'puntosinteres.id', '=', 'puntosinteres_id')
            //->where('puntosinteres.id','=',$request->id)
                ->paginate(10);
            return response()->json($eventopunto);
        }
        $eventos = Eventos::paginate(10);
        return response()->json($eventos);
    }

    public function update(Request $request, $idEvento)
    {

        $evento = DB::table('eventos')
            ->where('Eventos_id', '=', $idEvento)
            ->update([
                'puntosinteres_id'       => $request->LugarDelEvento,
                'NombreEvento'           => $request->NombreEvento,
                'LugarDeVentaDeEntradas' => $request->LugarDeVentaDeEntradas,
                'FechaInicio'            => $request->FechaInicio,
                'FechaFin'               => $request->FechaFin,
                'HoraInicio'             => $request->HoraInicio,
                'HoraFin'                => $request->HoraFin,
                'TipoEvento'             => $request->TipoEvento,
            ]);

        return response()->json([
            "codigo"    => '200',
            "respuesta" => "Se modifico con exito",
        ]);
    }
    public function destroy(request $request, $id)
    {
        if ($request->Opcion === 'EliminarImagen') {
            $evento = DB::table('eventos')
                ->where('Eventos_id', '=', $id)
                ->update(['ImagenEvento' => null]);
            return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito la Imagen",
            ]);
        }
        if ($request->Opcion === 'EliminarEvento') {
            $evento = DB::table('eventos')
                ->where('Eventos_id', '=', $id)
                ->delete();
            return response()->json([
                "codigo"    => "200",
                "respuesta" => "Se elimino con exito",
            ]);
        }

    }
    public function ModificarImagenesEventos(Request $request, $idEvento)
    {
        if (!$request->hasFile('file')) {
            return $this->returnError(202, 'file is required');
        }
        $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
        $url      = $response->getSecurePath();

        $evento = DB::table('eventos')
            ->where('Eventos_id', '=', $idEvento)
            ->update(['ImagenEvento' => $url]);

        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se agrego imagen con exito",
            "idEvento"  => $idEvento,
        ]);
    }

}
