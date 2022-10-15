<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
class Espectaculos extends Model
{
    protected $table='espectaculos';
    use HasFactory;
    //use SoftDeletes;
    public function PuntosInteres(){
        return $this->belongsTo(PuntosInteres::class, "puntosinteres_id", "id");
    }
}
