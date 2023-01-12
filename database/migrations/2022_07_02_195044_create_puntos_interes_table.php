<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::create('puntosinteres', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Departamento')->nullable();
            $table->string('Ciudad')->nullable();
            $table->string('Direccion')->nullable();
            $table->string('HoraDeApertura')->nullable();
            $table->string('HoraDeCierre')->nullable();
            $table->string('Facebook')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('Web')->nullable();
            $table->string('Descripcion')->nullable();
            $table->string('Imagen')->nullable();
            $table->integer('Latitud')->nullable();
            $table->integer('Longitud')->nullable();
            $table->set('TipoDeLugar', ['Espacio cerrado', 'Al aire libre', 'Ambos']);
            $table->set('RestriccionDeEdad', ['Todas', 'Mayores']);
            $table->set('EnfoqueDePersonas', ['Grupo', 'Familia', 'Pareja', 'Individual', 'Sin restriccion']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
};
