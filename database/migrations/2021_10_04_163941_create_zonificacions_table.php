<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonificacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombreModulo');
            $table->integer('numeroZona');
            $table->integer('numeroParticion');
            $table->string('nombreParticion');
            $table->string('nombreSensor');
            $table->string('numeroSerie');
            $table->string('descripcion');
            $table->foreignId('informe_id')->references('id')->on('informes');
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
        Schema::dropIfExists('zonificacions');
    }
}
