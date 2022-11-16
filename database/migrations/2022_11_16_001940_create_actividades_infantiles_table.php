<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesInfantilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_infantiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
                ->constrained('puntosinteres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->set('Tipo', ['Circo','Calesita','Maquinitas','Juegos Infantiles']);
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
        Schema::dropIfExists('actividades_infantiles');
    }
}
