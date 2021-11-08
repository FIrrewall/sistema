<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('detalle');
            $table->string('codigo');
            $table->string('proveedor');
            $table->string('cliente');
            $table->string('proyecto');
            $table->string('tipoComprobante');
            $table->integer('numeroComprobante');
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
        Schema::dropIfExists('gastos');
    }
}
