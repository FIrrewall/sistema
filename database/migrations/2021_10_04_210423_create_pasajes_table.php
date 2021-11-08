<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('detalle');
            $table->string('codigo');
            $table->string('transporte');
            $table->string('origen');
            $table->string('destino');
            $table->string('cliente');
            $table->string('proyecto');
            $table->double('monto');
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
        Schema::dropIfExists('pasajes');
    }
}
