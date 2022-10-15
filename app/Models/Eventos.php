<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $table='eventos';
    public function VerArtistas(){
        return $this->hasMany(Artistas::class,'eventos_id','id');
    }
    public function PuntosInteres(){
        return $this->belongsTo(PuntosInteres::class, "puntosinteres_id", "id");
    }
}
