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
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->set('Tipo',['Hotel','Hostel','Motel','Estancia','Camping','Casa']);
            $table->integer('Habitaciones')->nullable();
            $table->integer('Calificaciones')->nullable();
            $table->boolean('TvCable')->nullable();
            $table->boolean('Piscina')->nullable();
            $table->boolean('Wifi')->nullable();
            $table->boolean('AireAcondicionado')->nullable();
            $table->boolean('BanoPrivad')->nullable();
            $table->boolean('Casino')->nullable();
            $table->boolean('Bar')->nullable();
            $table->boolean('Restaurante')->nullable();
            $table->boolean('Desayuno')->nullable();
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
