<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use App\Models\Transporte;
use App\Models\Telefonos;
use App\Models\Espectaculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;

class PuntosInteresController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'Nombre'       => 'required',
            'Departamento' => 'required',
            'Ciudad'       => 'required',
            'Direccion'    => 'required',
            'Telefono'     => 'required' 
        ], [
            'Nombre.required'       => 'El nombre es obligatorio',
            'Departamento.required' => 'El Departamento es obligatorio',
            'Ciudad.required'       => 'La Ciudad es obligatorio',
            'Direccion.required'    => 'La direccion es obligatorio',
            'Telefono.required'     => 'El Telefono es obligatorio',
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //try {
        //DB::beginTransaction();
        $puntosInteres               = new PuntosInteres();
        $puntosInteres->Nombre       = $request->Nombre;
        $puntosInteres->Departamento = $request->Departamento;
        $puntosInteres->Ciudad       = $request->Ciudad;
        $puntosInteres->Direccion    = $request->Direccion;
        $puntosInteres->HoraDeApertura = $request->HoraDeApertura;
        $puntosInteres->HoraDeCierre = $request->HoraDeCierre;
        $puntosInteres->Facebook     = $request->Facebook;
        $puntosInteres->Instagram    = $request->Instagram;
        $puntosInteres->Descripcion  = $request->Descripcion;
        $puntosInteres->save();
            //Imagen
            if (!$request->Imagen->hasFile('file')) {
                return $this->returnError(202, 'file is required');
            }
            // $response  = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            
            $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
            $public_id = $response->getPublicId();
            $url       = $response->getSecurePath();

            ImagenesPuntosDeInteres::create([
                "url"         => $url,
                "public_id"   => $public_id,
                "descripcion" => $request->image_description,
            ]);
            //
        $PuntosDeInteresDetallado  = json_decode($request->InformacionDetalladaPuntoDeInteres);
        $id = PuntosInteres::latest('id')->first();
        $this->AltaDeTelefono($id->id,$request->Telefono);
        if(!empty($request->Celular)){$this->AltaDeTelefono($id->id,$request->Celular);}
        if ($PuntosDeInteresDetallado->Op === 'ServicioEsencial') {
            return $this->AltaDeServicio($id->id, $PuntosDeInteresDetallado->Tipo);
        }
        if ($PuntosDeInteresDetallado->Op === 'transporte') {
            return $this->AltaDeTransporte($id->id, $PuntosDeInteresDetallado->Tipo);
        }
        if ($PuntosDeInteresDetallado->Op === 'Espectaculos') {
            return $this->AltaDeEspectaculos($id->id,$PuntosDeInteresDetallado->Artista,$PuntosDeInteresDetallado->PrecioEntrada,$PuntosDeInteresDetallado->Tipo);
        }

        //DB::commit();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    //}
    // catch(Exception $e){
    //     DB::rollBack();
    // }

    }
    public function AltaDeServicio($IdPuntoDeInteres, $TipoDetallado)
    {
        $servicio                   = new ServiciosEsenciales();
        $servicio->puntosinteres_id = $IdPuntoDeInteres;
        $servicio->Tipo             = $TipoDetallado;
        $servicio->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeTransporte($IdPuntoDeInteres, $TipoDetallado)
    {
        $transporte                   = new Transporte();
        $transporte->puntosinteres_id = $IdPuntoDeInteres;
        $transporte->Tipo             = $TipoDetallado;
        $transporte->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeEspectaculos($IdPuntoDeInteres,$Artista,$PrecioEntrada,$tipoDeServicio)
    {
        $Espectaculo                   = new Espectaculos();
        $Espectaculo->puntosinteres_id = $IdPuntoDeInteres;
        $Espectaculo->Artista          = $Artista;
        $Espectaculo->PrecioEntrada    = $PrecioEntrada;
        $Espectaculo->Tipo             = $tipoDeServicio;
        $Espectaculo->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeTelefono($id,$Telefonos){
        $Telefono=new Telefonos();
        $Telefono->puntosinteres_id=$id;
        $Telefono->Telefono=$Telefonos;
        $Telefono->save();
    }

    public function ListarPuntosDeInteres(Request $request, $Categoria)
    {
        if($request->Opcion==='Unico'){
            if($Categoria==='PuntosDeInteres'){
            
                $PuntosDeInteres=PuntosInteres::find($request->id);
                return response() ->json($PuntosDeInteres);
                
            }
            $puntoInteres = DB::table('puntosinteres')
            ->Join($request->Categoria,'puntosinteres.id','=','puntosinteres_id')
            ->where('puntosinteres.id','=',$request->id)
            ->get();
            return response()->json($puntoInteres);

        }
        if($Categoria==='PuntosDeInteres'){
            
            $PuntosDeInteres=PuntosInteres::paginate(10);
            return response() ->json($PuntosDeInteres);
            
        }
        if($Categoria==='Telefonos'){
            $Telefonos=PuntosInteres::find($request->id);
            $Telefonos=$Telefonos->VerTelefonos;
            return response() ->json($Telefonos); 
        }
        $puntosInteres = DB::table('puntosinteres')
        ->Join($Categoria,'puntosinteres.id','=','puntosinteres_id')
        ->paginate(10);
        
        return response() ->json($puntosInteres);

    }
    public function update(Request $request, $IdPuntoDeInteres)
    {
        $puntosInteres               = PuntosInteres::findOrFail($IdPuntoDeInteres);
        $puntosInteres->Nombre       = $request->Nombre;
        $puntosInteres->Departamento = $request->Departamento;
        $puntosInteres->Ciudad       = $request->Ciudad;
        $puntosInteres->Direccion    = $request->Direccion;
        $puntosInteres->HoraDeApertura = $request->HoraDeApertura;
        $puntosInteres->HoraDeCierre = $request->HoraDeCierre;
        $puntosInteres->Facebook     = $request->Facebook;
        $puntosInteres->Instagram    = $request->Instagram;
        $puntosInteres->Descripcion  = $request->Descripcion;
        $puntosInteres->Imagen       = $request->Imagen;
        $puntosInteres->save();

        return response()->json([
            "codigo"    => '200',
            "respuesta" => "Se modifico con exito",
        ]);
       // return $this->ModificarTelefonos($IdPuntoDeInteres,$request->Telefono);
        
    }
    
    public function ModificarTelefonos($id,$TelefonoViejo, $TelefonoNuevo){
        $telefono=DB::table('telefonos')
        ->where('puntosinteres_id','=',$id)
        ->where('Telefono','=',$TelefonoViejo)
        ->update(['Telefono' => $TelefonoNuevo]);
        return $telefono;
        // $telefono->Telefono=$Telefono;
        // $telefono->save();
    }
    public function destroy($IdPuntoDeInteres)
    {
        $Punto=PuntosInteres::findOrFail($IdPuntoDeInteres);
        $Punto->delete();
         return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
        ]);
    
    }
}
