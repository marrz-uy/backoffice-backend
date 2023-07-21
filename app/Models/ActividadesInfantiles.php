<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesInfantiles extends Model
{
    use HasFactory;

    protected $table = 'actividades_infantiles';

    protected $fillable = [
        'Tipo'
    ];
}