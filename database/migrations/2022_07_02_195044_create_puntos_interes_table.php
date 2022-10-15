<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('puntosinteres', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre');
            $table->String('Departamento')->nullable();
            $table->String('Ciudad')->nullable();
            $table->String('Direccion')->nullable();
            $table->String('HoraDeApertura')->nullable();
            $table->String('HoraDeCierre')->nullable();
            $table->String('Facebook')->nullable();
            $table->String('Instagram')->nullable();
            $table->String('Descripcion')->nullable();
            $table->String('Imagen')->nullable();
            $table->integer('Latitud')->nullable();
            $table->integer('Longitud')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
};
