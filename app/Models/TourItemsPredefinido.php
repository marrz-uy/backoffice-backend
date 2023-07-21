<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItemsPredefinido extends Model
{
    use HasFactory;

    protected $table = 'tour_items_predefinido';

    protected $fillable = [
        'tourId', /* foreign key */
        'puntoInteresId', /* foreign key */
    ];

    public function TourPredefinido()
    {
        return $this->belongsTo(TourPredefinido::class);
    }

    public function PuntosInteres()
    {
        return $this->hasOne(PuntosInteres::class, 'id', 'puntoInteresId');
    }

}
