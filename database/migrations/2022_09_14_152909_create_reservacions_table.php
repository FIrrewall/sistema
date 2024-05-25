<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->integer('edad');
            $table->string('ci');
            $table->string('estado');
            $table->string('nombreacompañante')->nullable();
            $table->string('paternoacompañante')->nullable();
            $table->string('maternoacompañante')->nullable();
            $table->integer('edadacompañante')->nullable();
            $table->string('ciacompañante')->nullable();
            $table->date('fecha');
            $table->time('horaentrada');
            $table->time('horasalida');
            $table->string('tiempo');
            $table->string('compañia');
            $table->double('costohabitacion');
            $table->double('costoExtra');
            $table->double('total');
            $table->unsignedBigInteger('habitacion_id');
            $table->unsignedBigInteger('encargado_id');
            $table->foreign('habitacion_id')->references('id')->on('habitacions')->onDelete('cascade');
            $table->foreign('encargado_id')->references('id')->on('encargados')->onDelete('cascade');
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
        Schema::dropIfExists('reservacions');
    }
}
