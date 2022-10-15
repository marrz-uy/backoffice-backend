<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('servicios_esenciales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->set('Tipo',['Hospitales','Farmacias','Cerrajerias','Estaciones de Servicio','Seccionales']);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('servicios_esenciales');
    }
};
