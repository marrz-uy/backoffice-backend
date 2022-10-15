<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table='transporte';
    use HasFactory;
    public function PuntosInteres(){
        return $this->belongsTo(PuntosInteres::class, "puntosinteres_id", "id");
    }
}
