<?php

namespace App\Http\Controllers;

use App\Models\ImagenesPuntosDeInteres;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ImagenesPuntoInteresController extends Controller
{

    public function showImages(Request $request, $puntosinteres_id)
    {
        
        $imagen = ImagenesPuntosDeInteres::where('puntosinteres_id','=',$puntosinteres_id)->get('url','public_id');
        return response()->json($imagen);
    }

    public function saveImage(Request $request)
    {
       
        try {
            if (!$request->hasFile('file')) {
                return $this->returnError(202, 'file is required');
            }
            
            
            $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
            $public_id = $response->getPublicId();
            $url       = $response->getSecurePath();

                $Imagen=new ImagenesPuntosDeInteres();
                $Imagen->url=$url;
                $Imagen->public_id=$public_id;
                $Imagen->image_description=$request->image_description;
                $Imagen->puntosinteres_id=(int)$request->puntosinteres_id;
                $Imagen->save();
            return response()->json([
                
                'message' => 'Successfully uploaded image',
                'url'  => $response->getSecurePath(),
                "image_description" => $request->image_description,
                "puntosinteres_id"=>(int)$request->puntosinteres_id,
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Record not found.' . $e
            ], 404);
        }

    }
    public function EliminarImagen(Request $request){

        $Imagen=ImagenesPuntosDeInteres::where('url','=',$request->url)->first();
        $Imagen->delete();
         return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se elimino con exito",
            "Id"=>$Imagen->id
        ]);
    }
    public function ModificarImagenesEventos(Request $request,$idEvento){
        if (!$request->hasFile('file')) {
            return $this->returnError(202, 'file is required');
        }
        $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
            $url       = $response->getSecurePath();
        
            $evento=DB::table('eventos')
            ->where('Eventos_id','=',$idEvento)
            ->update(['ImagenEvento' => $url]);

        return response()->json([
            "codigo"    => "200",
            "respuesta" => "Se agrego imagen con exito",
        ]);
    }
}