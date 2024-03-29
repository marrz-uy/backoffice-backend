<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            $table->String('ImagenEvento', 500);
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