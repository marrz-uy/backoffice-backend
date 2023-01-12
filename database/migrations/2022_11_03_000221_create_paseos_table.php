<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaseosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paseos', function (Blueprint $table) {
        $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->String('Recomendaciones');
        $table->set('Tipo', ['Playas','Ejercicios al aire libre','Cerros','Sierras']);
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
        Schema::dropIfExists('paseos');
    }
}
