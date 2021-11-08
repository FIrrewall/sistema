<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_alarmas', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroUsuario');
            $table->string('nombreUsuario');
            $table->string('area');
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
        Schema::dropIfExists('usuarios_alarmas');
    }
}
