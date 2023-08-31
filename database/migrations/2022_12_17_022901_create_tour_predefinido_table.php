<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPredefinidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_predefinido', function (Blueprint $table) {
            $table->id();
            $table->string('nombreTourPredefinido');
            $table->string('horaDeInicioTourPredefinido');
            $table->string('descripcionTourPredefinido', 500);
            $table->string('imagenTour', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_predefinido');
    }
}