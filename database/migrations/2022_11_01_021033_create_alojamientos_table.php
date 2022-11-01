<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlojamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alojamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->set('Tipo',['Hotel','Hostel','Motel','Estancia','Camping','Casa']);
            $table->integer('Costos')->nullable();
            $table->integer('Habitaciones')->nullable();
            $table->integer('Calificaciones')->nullable();
            $table->String('TvCable')->nullable();
            $table->String('Piscina')->nullable();
            $table->String('Wifi')->nullable();
            $table->String('AireAcondicionado')->nullable();
            $table->String('BanoPrivad')->nullable();
            $table->String('Casino')->nullable();
            $table->String('Bar')->nullable();
            $table->String('Restaurante')->nullable();
            $table->String('Desayuno')->nullable();
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
        Schema::dropIfExists('alojamientos');
    }
}
