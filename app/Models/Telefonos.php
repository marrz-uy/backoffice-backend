<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefonos extends Model
{
    use HasFactory;
    public function PuntosInteresTelefonos(){
        return $this->belongsTo(PuntosInteres::class, "puntosinteres_id", "id");
    }
}
