<?php

namespace App\Http\Controllers;

use App\Models\ImagenesPuntosDeInteres;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ImagenesPuntoInteresController extends Controller
{

    public function showImages(Request $request)
    {
        $imagen = ImagenesPuntosDeInteres::All('url','public_id');
        return response()->json($imagen);
    }

    public function saveImage(Request $request)
    {
        // return response()->json([
        //     'respuesta'=>$request
            
        // ]);

        //en request enviar imagen e "image_description"
        try {
            if (!$request->hasFile('file')) {
                return $this->returnError(202, 'file is required');
            }
            // $response  = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']);
            
            $response = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'feeluy']);
            $public_id = $response->getPublicId();
            $url       = $response->getSecurePath();

            ImagenesPuntosDeInteres::create([
                "url"         => $url,
                "public_id"   => $public_id,
                "image_description" => $request->image_description,
            ]);

            return response()->json([
                
                'message' => 'Successfully uploaded image',
                'url'  => $response->getSecurePath(),
                "image_description" => $request->image_description,
            ]);
        } catch (\Exception $e) {
            // return $this->returnError(201, $e->getMessage());
            return response()->json([
                'message' => 'Record not found.' . $e
            ], 404);
        }

    }

}