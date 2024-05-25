<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
            $table->id();
            $table->string('nombreE');
            $table->string('paternoE');
            $table->string('maternoE');
            $table->string('ciE');
            $table->integer('celularE');
            $table->unsignedBigInteger('alojamiento_id');
            $table->foreign('alojamiento_id')->references('id')->on('alojamientos')->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            //$table->string('contraseña');
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
        Schema::dropIfExists('encargados');
    }
}
