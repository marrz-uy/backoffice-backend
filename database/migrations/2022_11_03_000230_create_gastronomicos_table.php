<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastronomicosTable extends Migration
{
    
    public function up()
    {
        Schema::create('gastronomicos', function (Blueprint $table) {
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->boolean('ComidaVegge')->nullable();
            $table->String('Especialidad')->nullable();
            $table->boolean('Alcohol')->nullable();
            $table->boolean('MenuInfantil')->nullable();
            $table->set('Tipo',['Restaurantes','Bares','Comida rapida','Cervecerias']);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('gastronomicos');
    }
}
