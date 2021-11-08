<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaChicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_chicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha');
            $table->string('detalle');
            $table->string('codigo');
            $table->string('proveedor');
            $table->string('clienteProyecto');
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
        Schema::dropIfExists('caja_chicas');
    }
}
