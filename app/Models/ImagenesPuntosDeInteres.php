<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class ImagenesPuntosDeInteres extends Model
{
    use HasFactory, MediaAlly;

    protected $table = 'imagenes_puntos_de_interes';
    public function PuntosInteres(){
        return $this->belongsTo(PuntosInteres::class, "puntosinteres_id", "id");
    }
    public $fillable = [
        'url',
        'public_id',
        'image_description'
    ];
}
