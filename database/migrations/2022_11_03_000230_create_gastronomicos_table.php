<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastronomicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastronomicos', function (Blueprint $table) {
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->boolean('ComidaVegge')->nullable();
            $table->string('Especialidad')->nullable();
            $table->boolean('Alcohol')->nullable();
            $table->boolean('MenuInfantil')->nullable();
            $table->set('Tipo',['Restaurantes','Bares','Comida rapida','Cervecerias']);
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
        Schema::dropIfExists('gastronomicos');
    }
}