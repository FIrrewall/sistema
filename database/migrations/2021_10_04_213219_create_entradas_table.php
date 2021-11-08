<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroFactura');
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
        Schema::dropIfExists('entradas');
    }
}
