<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesNocturnas extends Model
{
    use HasFactory;

    protected $table = 'actividades_nocturnas';

    protected $fillable = [
        'Tipo'
    ];
}