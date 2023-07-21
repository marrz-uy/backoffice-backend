<?php

namespace App\Models;

use App\Models\PuntosInteres;
use App\Models\TourArmado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourId', /* foreign key */
        'puntoInteresId', /* foreign key */
    ];

    public function TourArmados()
    {
        return $this->belongsTo(TourArmado::class);
    }

    public function PuntosInteres()
    {
        return $this->hasOne(PuntosInteres::class, 'id', 'puntoInteresId');
    }

}
