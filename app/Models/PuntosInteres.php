<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosInteres extends Model
{
    use HasFactory;
    protected $table='puntosinteres';
    public function VerTelefonos(){
        return $this->hasMany(Telefonos::class,'puntosinteres_id','id');
    }
    // protected $fillable=[
    //     'Nombre',
    //     'Departamento',
    //     'Ciudad',
    //     'Direccion',
    //     'Contacto',
    //     'Horario',
    //     'Descripcion'
    // ];
}
