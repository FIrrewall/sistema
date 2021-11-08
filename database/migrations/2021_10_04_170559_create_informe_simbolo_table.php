<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeSimboloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_simbolo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('simbolo_id')->references('id')->on('simbolos');
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
        Schema::dropIfExists('informe_simbolo');
    }
}
