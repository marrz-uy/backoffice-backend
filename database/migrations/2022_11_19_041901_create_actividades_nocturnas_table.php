<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesNocturnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_nocturnas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
                ->constrained('puntosinteres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->set('Tipo', ['Discoteca','Casino','Pool','Cantina','Bowling']);
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
        Schema::dropIfExists('actividades_nocturnas');
    }
}
