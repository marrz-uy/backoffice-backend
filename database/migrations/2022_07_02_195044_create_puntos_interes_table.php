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
            $table->string('Nombre', 500);
            $table->string('Departamento', 500)->nullable();
            $table->string('Ciudad', 500)->nullable();
            $table->string('Direccion', 500)->nullable();
            $table->string('HoraDeApertura', 500)->nullable();
            $table->string('HoraDeCierre', 500)->nullable();
            $table->string('Facebook', 500)->nullable();
            $table->string('Instagram', 500)->nullable();
            $table->string('Web', 500)->nullable();
            $table->text('Descripcion')->nullable();
            $table->integer('Latitud')->nullable();
            $table->integer('Longitud')->nullable();
            $table->set('TipoDeLugar', ['Espacio cerrado', 'Al aire libre', 'Ambos']);
            $table->set('RestriccionDeEdad', ['Todas', 'Mayores']);
            $table->set('EnfoqueDePersonas', ['Grupo', 'Familia', 'Pareja', 'Individual', 'Sin restriccion']);
            $table->integer('Megusta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
};