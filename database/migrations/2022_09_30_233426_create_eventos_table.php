<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('Eventos_id');
            $table->foreignId('puntosinteres_id')
                ->constrained('puntosinteres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->String('NombreEvento');
            $table->set('LugarDeVentaDeEntradas', ['Abitab', 'RedPagos', 'TickAntel', 'LugarDelEvento', 'AccesoYa', 'RedTickets']);
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->time('HoraInicio');
            $table->time('HoraFin')->nullable();
            $table->String('TipoEvento');
            $table->string('ImagenEvento',500)->nullable();
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
        Schema::dropIfExists('eventos');
    }
};
