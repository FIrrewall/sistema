<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProyecto');
            $table->integer('numeroNota');
            $table->timestamp('fecha');
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('numeroSerie');
            $table->integer('cantidad');
            $table->foreignId('inventari_id')->references('id')->on('inventaris');
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
        Schema::dropIfExists('salidas');
    }
}
