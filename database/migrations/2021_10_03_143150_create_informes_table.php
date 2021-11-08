<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('tipoInforme');
            $table->string('departamento');
            $table->string('cliente');
            $table->string('direccion');
            $table->timestamp('fecha');
            $table->string('nombreAgencia');
            $table->string('nombreAtm');
            $table->string('modeloPanel');
            $table->integer('lineaTelefonica');
            $table->string('ipModulo');
            $table->text('observaciones');
            $table->text('recomendaciones');
            $table->boolean('estado');
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
        Schema::dropIfExists('informes');
    }
}
