<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPredefinido extends Model
{
    use HasFactory;

    protected $table = 'tour_predefinido';

    protected $fillable = [
        'nombreTourPredefinido',
        'descripcionTourPredefinido',
        'horaDeInicioTourPredefinido',
    ];

    public function TourItems()
    {
        return $this->hasMany(TourItemsPredefinido::class, 'tourId', 'id');
    }
}