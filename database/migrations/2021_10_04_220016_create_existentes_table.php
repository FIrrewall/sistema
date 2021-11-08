<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existentes', function (Blueprint $table) {
            $table->id();
            $table->string('codigoProducto');
            $table->string('descripcion');
            $table->integer('existenciaInicial');
            $table->foreignId('inventari_id')->references('id')->on('inventaris');
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
        Schema::dropIfExists('existentes');
    }
}
