<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaticos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha');
            $table->string('detalle');
            $table->string('codigo');
            $table->string('alojamiento');
            $table->string('desayuno');
            $table->string('almuerzo');
            $table->string('cena');
            $table->string('gastosVarios');
            $table->string('detalleGastosVarios');
            $table->string('transporte');
            $table->foreignId('descargo_id')->references('id')->on('descargos');
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
        Schema::dropIfExists('viaticos');
    }
}
