<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspectaculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espectaculos', function (Blueprint $table) {
            $table->foreignId('puntosinteres_id')
                ->constrained('puntosinteres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->set('Tipo', ['Cine', 'Teatro', 'Carnaval', 'Evento Deportivo', 'Evento Musical']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espectaculos');
    }
}
