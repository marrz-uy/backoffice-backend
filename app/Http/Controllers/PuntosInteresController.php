<?php

namespace App\Http\Controllers;

use App\Models\PuntosInteres;
use App\Models\ServiciosEsenciales;
use App\Models\Transporte;
use App\Models\Paseos;
use App\Models\Telefonos;
use App\Models\Alojamiento;
use App\Models\Espectaculos;
use App\Models\Gastronomicos;
use App\Models\ActividadesInfantiles;
use App\Models\ActividadesNocturnas;
use App\Models\ImagenesPuntosDeInteres;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PuntosInteresController extends Controller
{
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'Nombre'       => 'required',
            'Departamento' => 'required',
            'Ciudad'       => 'required',
            'Direccion'    => 'required',
            'Latitud'      => 'integer',
            'Longitud'     => 'integer',
        ], [
            'Nombre.required'       => 'El nombre es obligatorio',
            'Departamento.required' => 'El Departamento es obligatorio',
            'Ciudad.required'       => 'La Ciudad es obligatorio',
            'Direccion.required'    => 'La direccion es obligatorio',
            'Latitud.integer'       => 'Latitud debe ser un numero',
            'Longitud.integer'      => 'Longitud debe ser un numero',
        ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //try {
        //DB::beginTransaction();
        
        $puntosInteres               = new PuntosInteres();
        $puntosInteres->Nombre          = $request->Nombre;
        $puntosInteres->Departamento    = $request->Departamento;
        $puntosInteres->Ciudad          = $request->Ciudad;
        $puntosInteres->Direccion       = $request->Direccion;
        $puntosInteres->HoraDeApertura  = $request->HoraDeApertura;
        $puntosInteres->HoraDeCierre    = $request->HoraDeCierre;
        $puntosInteres->Facebook        = $request->Facebook;
        $puntosInteres->Instagram       = $request->Instagram;
        $puntosInteres->Descripcion     = $request->Descripcion;
        $puntosInteres->Latitud         = $request->Latitud;
        $puntosInteres->Longitud        = $request->Longitud;
        $puntosInteres->TipoDeLugar     = $request->TipoDeLugar;
        $puntosInteres->RestriccionDeEdad         = $request->RestriccionDeEdad;
        $puntosInteres->EnfoqueDePersonas        = $request->EnfoqueDePersonas;
        $puntosInteres->save();
        

        $PuntosDeInteresDetallado  = json_decode($request->InformacionDetalladaPuntoDeInteres,true);
        
        $id = PuntosInteres::latest('id')->first();
        if(!empty($request->Telefono)){$this->AltaDeTelefono($id->id,$request->Telefono);}
        if(!empty($request->Celular)){$this->AltaDeTelefono($id->id,$request->Celular);}
        //$this->AltaDeTelefono($id->id,$request->Telefono);
        //echo "<pre>";var_dump($PuntosDeInteresDetallado);die();
        
        if(!empty($PuntosDeInteresDetallado['Op'])){        
            if ($PuntosDeInteresDetallado['Op'] === 'ServicioEsencial') {return $this->AltaDeServicio($id->id, $PuntosDeInteresDetallado['Tipo']);}
            if ($PuntosDeInteresDetallado['Op'] === 'transporte') {return $this->AltaDeTransporte($id->id, $PuntosDeInteresDetallado['Tipo']);}
            if ($PuntosDeInteresDetallado['Op'] === 'Espectaculos') {return $this->AltaDeEspectaculos($id->id,$PuntosDeInteresDetallado['Tipo']);}
            if ($PuntosDeInteresDetallado['Op'] === 'Alojamiento'){return $this->AltaDeAlojamiento($id->id,$PuntosDeInteresDetallado);}
            if ($PuntosDeInteresDetallado['Op'] === 'Gastronomicos'){return $this->AltaDeGastronomico($id->id,$PuntosDeInteresDetallado);}
            if ($PuntosDeInteresDetallado['Op'] === 'ActividadesInfantiles') {return $this->AltaDeActividadesInfantiles($id->id, $PuntosDeInteresDetallado['Tipo']);}
            if ($PuntosDeInteresDetallado['Op'] === 'ActividadesNocturnas') {return $this->AltaDeActividadesNocturnas($id->id, $PuntosDeInteresDetallado['Tipo']);}
            if ($PuntosDeInteresDetallado['Op'] === 'Paseos') {return $this->AltaDePaseos($id->id, $PuntosDeInteresDetallado);}
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
    public function saveImage($Imagen)
    {
        //en request enviar imagen e "image_description"
        
        try {
            if (!$Imagen->hasFile('file')) {
                return $this->returnError(202, 'file is required');
            }
            // $response  = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            
            $response = Cloudinary::upload($Imagen->file('file')->getRealPath(), ['folder' => 'feeluy']);
            $public_id = $response->getPublicId();
            $url       = $response->getSecurePath();

            ImagenesPuntosDeInteres::create([
                "url"         => $url,
                "public_id"   => $public_id,
                "image_description" => 'Value1',
            ]);

            return response()->json([
                'message' => 'Successfully uploaded image',
                'url'  => $response->getSecurePath(),
                "descripcion" => $request->image_description,
            ]);
        } catch (\Exception$e) {
            // return $this->returnError(201, $e->getMessage());
            return response()->json([
                'message' => $e,
            ], 404);
        }

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
    public function AltaDeEspectaculos($IdPuntoDeInteres,$tipoDeServicio)
    {
        $Espectaculo                   = new Espectaculos();
        $Espectaculo->puntosinteres_id = $IdPuntoDeInteres;
        $Espectaculo->Tipo             = $tipoDeServicio;
        $Espectaculo->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDePaseos($IdPuntoDeInteres,$datos)
    {
        $Paseos = new Paseos();
        $Paseos->puntosinteres_id = $IdPuntoDeInteres;
        if(isset($datos['Tipo'])) $Paseos->Tipo = $datos['Tipo'];
        if(isset($datos['Recomendaciones'])) $Paseos->Recomendaciones = $datos['Recomendaciones'];
       // echo "<pre>";var_dump($datos);die();
        $Paseos->save();
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
    public function AltaDeAlojamiento($IdPuntoDeInteres,$datos)
    {
        $alojamiento = new Alojamiento();
        $alojamiento->puntosinteres_id = $IdPuntoDeInteres;
        //return $datos['Tipo'];
        if(isset($datos['Tipo'])) $alojamiento->Tipo = $datos['Tipo'];
        if(isset($datos['Habitaciones'])) $alojamiento->Habitaciones = $datos['Habitaciones'];
        if(isset($datos['Calificaciones'])) $alojamiento->Calificaciones = $datos['Calificaciones'];
        if(isset($datos['TvCable'])) $alojamiento->TvCable = $datos['TvCable'];
        if(isset($datos['Piscina'])) $alojamiento->Piscina = $datos['Piscina'];
        if(isset($datos['Wifi'])) $alojamiento->Wifi = $datos['Wifi'];
        if(isset($datos['AireAcondicionado'])) $alojamiento->AireAcondicionado = $datos['AireAcondicionado'];
        if(isset($datos['BanoPrivado'])) $alojamiento->BanoPrivad =$datos['BanoPrivado'];
        if(isset($datos['Casino'])) $alojamiento->Casino = $datos['Casino'];
        if(isset($datos['Bar'])) $alojamiento->Bar = $datos['Bar'];
        if(isset($datos['Restaurante'])) $alojamiento->Restaurante = $datos['Restaurante'];
        if(isset($datos['Desayuno'])) $alojamiento->Desayuno = $datos['Desayuno'];
       // echo "<pre>";var_dump($datos);die();
        $alojamiento->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeGastronomico($IdPuntoDeInteres,$datos)
    {
        $gastronomico = new Gastronomicos();
        $gastronomico->puntosinteres_id = $IdPuntoDeInteres;
        if(isset($datos['Tipo'])) $gastronomico->Tipo = $datos['Tipo'];
        if(isset($datos['ComidaVegge'])) $gastronomico->ComidaVegge = $datos['ComidaVegge'];
        if(isset($datos['Comida'])) $gastronomico->Comida = $datos['Comida'];
        if(isset($datos['Alcohol'])) $gastronomico->Alcohol = $datos['Alcohol'];
        if(isset($datos['MenuInfantil'])) $gastronomico->MenuInfantil = $datos['MenuInfantil'];
       // echo "<pre>";var_dump($datos);die();
        $gastronomico->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeActividadesInfantiles($IdPuntoDeInteres, $TipoDetallado)
    {
        $ActividadesInfantiles                   = new ActividadesInfantiles();
        $ActividadesInfantiles->puntosinteres_id = $IdPuntoDeInteres;
        $ActividadesInfantiles->Tipo             = $TipoDetallado;
        $ActividadesInfantiles->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
    }
    public function AltaDeActividadesNocturnas($IdPuntoDeInteres, $TipoDetallado)
    {
        $ActividadesNocturnas                  = new ActividadesNocturnas();
        $ActividadesNocturnas->puntosinteres_id = $IdPuntoDeInteres;
        $ActividadesNocturnas->Tipo             = $TipoDetallado;
        $ActividadesNocturnas->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se ingreso con exito",
        ]);
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
        $puntosInteres                  = PuntosInteres::findOrFail($IdPuntoDeInteres);
        $puntosInteres->Nombre          = $request->Nombre;
        $puntosInteres->Departamento    = $request->Departamento;
        $puntosInteres->Ciudad          = $request->Ciudad;
        $puntosInteres->Direccion       = $request->Direccion;
        $puntosInteres->HoraDeApertura  = $request->HoraDeApertura;
        $puntosInteres->HoraDeCierre    = $request->HoraDeCierre;
        $puntosInteres->Facebook        = $request->Facebook;
        $puntosInteres->Instagram       = $request->Instagram;
        $puntosInteres->Descripcion     = $request->Descripcion;
        $puntosInteres->Latitud         = $request->Latitud;
        $puntosInteres->Longitud        = $request->Longitud;
        $puntosInteres->save();
        $PuntosDeInteresDetallado  = json_decode($request->InformacionDetalladaPuntoDeInteres,true);
        if($PuntosDeInteresDetallado['Op'] === 'Alojamiento'){
            return $this->ModificarAlojamiento($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        if($PuntosDeInteresDetallado['Op'] === 'Gastronomicos'){
            return $this->ModificarGastronomico($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        if($PuntosDeInteresDetallado['Op'] === 'ActividadesInfantiles'){
            return $this->ModificarActividadesInfantiles($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        if($PuntosDeInteresDetallado['Op'] === 'ActividadesNocturnas'){
            return $this->ModificarActividadesNocturnas($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        if($PuntosDeInteresDetallado['Op'] === 'transporte'){
            return $this->ModificarTransporte($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        if($PuntosDeInteresDetallado['Op'] === 'Paseos'){
            return $this->ModificarPaseos($IdPuntoDeInteres,$request->InformacionDetalladaPuntoDeInteres);
        }
        return response()->json([
            "codigo"    => '200',
            "respuesta" => "Se modifico con exito",
        ]);
       // return $this->ModificarTelefonos($IdPuntoDeInteres,$request->Telefono);
        
    }
    public function ModificarAlojamiento($IdPuntoDeInteres,$datos){
        $alojamiento = DB::table('alojamientos')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
        $alojamiento=Alojamiento::findOrFail($alojamiento[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $alojamiento->Tipo = $datos['Tipo'];
        if(isset($datos['Habitaciones'])) $alojamiento->Habitaciones = $datos['Habitaciones'];
        if(isset($datos['Calificaciones'])) $alojamiento->Calificaciones = $datos['Calificaciones'];
        if(isset($datos['TvCable'])) $alojamiento->TvCable = $datos['TvCable'];
        if(isset($datos['Piscina'])) $alojamiento->Piscina = $datos['Piscina'];
        if(isset($datos['Wifi'])) $alojamiento->Wifi = $datos['Wifi'];
        if(isset($datos['AireAcondicionado'])) $alojamiento->AireAcondicionado = $datos['AireAcondicionado'];
        if(isset($datos['BanoPrivado'])) $alojamiento->BanoPrivad =$datos['BanoPrivado'];
        if(isset($datos['Casino'])) $alojamiento->Casino = $datos['Casino'];
        if(isset($datos['Bar'])) $alojamiento->Bar = $datos['Bar'];
        if(isset($datos['Restaurante'])) $alojamiento->Restaurante = $datos['Restaurante'];
        if(isset($datos['Desayuno'])) $alojamiento->Desayuno = $datos['Desayuno'];
        $alojamiento->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);      
    }
    public function ModificarGastronomico($IdPuntoDeInteres,$datos){
        $gastronomico = DB::table('gastronomicos')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
                
        $gastronomico=Gastronomicos::findOrFail($gastronomico[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $gastronomico->Tipo = $datos['Tipo'];
        if(isset($datos['ComidaVegge'])) $gastronomico->ComidaVegge = $datos['ComidaVegge'];
        if(isset($datos['Comida'])) $gastronomico->Comida = $datos['Comida'];
        if(isset($datos['Alcohol'])) $gastronomico->Alcohol = $datos['Alcohol'];
        if(isset($datos['MenuInfantil'])) $gastronomico->MenuInfantil = $datos['MenuInfantil'];
       // echo "<pre>";var_dump($datos);die();
        $gastronomico->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);     
    }
    public function ModificarActividadesInfantiles($IdPuntoDeInteres,$datos){
        $ActividadesInfantiles = DB::table('actividades_infantiles')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
        $ActividadesInfantiles=ActividadesInfantiles::findOrFail($ActividadesInfantiles[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $ActividadesInfantiles->Tipo = $datos['Tipo'];
        $ActividadesInfantiles->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);      
    }
    public function ModificarActividadesNocturnas($IdPuntoDeInteres,$datos){
        $ActividadesNocturnas = DB::table('actividades_nocturnas')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
        $ActividadesNocturnas=ActividadesNocturnas::findOrFail($ActividadesNocturnas[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $ActividadesNocturnas->Tipo = $datos['Tipo'];
        $ActividadesNocturnas->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);      
    }
    public function ModificarTransporte($IdPuntoDeInteres,$datos){
        $transporte = DB::table('transporte')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
        $transporte=transporte::findOrFail($transporte[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $transporte->Tipo = $datos['Tipo'];
        $transporte->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);      
    }
    public function ModificarPaseos($IdPuntoDeInteres,$datos){
        $Paseos = DB::table('paseos')
                ->where('puntosinteres_id','=',$IdPuntoDeInteres)
                ->get();
        $Paseos=Paseos::findOrFail($Paseos[0]->id); 
        $datos  = json_decode($datos,true);    
        if(isset($datos['Tipo'])) $Paseos->Tipo = $datos['Tipo'];
        if(isset($datos['Recomendaciones'])) $Paseos->Recomendaciones = $datos['Recomendaciones'];
        $Paseos->save();
        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se modifico con exito",
        ]);      
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
