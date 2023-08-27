<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesPuntosDeInteresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_puntos_de_interes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
                ->constrained('puntosinteres')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('url'); //https://res.cloudinary.com/dioeqw1za/image/upload/v1676599422/feeluy/fzwgsvgdf2topw9arcav.png
            $table->string('public_id'); //feeluy/fzwgsvgdf2topw9arcav
            $table->string('image_description'); //descripcion
            $table->timestamps();
        });
    }
    //https://res.cloudinary.com/dioeqw1za/image/upload -/v1676599422/- /feeluy/fzwgsvgdf2topw9arcav.extension
    //https://res.cloudinary.com/dioeqw1za/image/upload/v1676599422/feeluy/fzwgsvgdf2topw9arcav.png

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_puntos_de_interes');
    }
}