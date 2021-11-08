<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdds', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('numeroSerie');
            $table->string('marca');
            $table->integer('cantidad');
            $table->string('capacidad');
            $table->bigInteger('informe_id')->unsigned();
            $table->timestamps();
            $table->foreign('informe_id')->references('id')->on('informes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hdds');
    }
}
