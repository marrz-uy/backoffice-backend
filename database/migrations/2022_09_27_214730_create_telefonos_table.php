<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puntosinteres_id')
            ->constrained('puntosinteres')
            ->onDelete('cascade');
            $table->integer('Telefono');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
};