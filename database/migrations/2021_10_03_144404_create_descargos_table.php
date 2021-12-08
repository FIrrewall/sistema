<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargos', function (Blueprint $table) {

            $table->id();
            $table->string('departamento');
            $table->string('nombreSolicitante');
            $table->string('cargo');
            $table->string('nombreDestinatario');
            $table->timestamp('fecha');//cambio de descargo
            $table->timestamp('fechaDesde');//Cambio realizado
            $table->timestamp('fechaHasta');
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
        Schema::dropIfExists('descargos');
    }
}
