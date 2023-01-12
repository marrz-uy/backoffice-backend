<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourItemsPredefinidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_items_predefinido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourId');
            $table->foreign('tourId')
                ->references('id')
                ->on('tour_predefinido')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('puntoInteresId');
            $table->foreign('puntoInteresId')
                ->references('id')
                ->on('puntosinteres');
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
        Schema::dropIfExists('tour_items_predefinido');
    }
}
