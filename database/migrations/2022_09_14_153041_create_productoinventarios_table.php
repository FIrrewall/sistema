<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoinventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoinventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');
            $table->integer('cantidad');
            $table->integer('entrada');
            $table->integer('salida');
            $table->integer('stock');
            $table->date('fecha');
            $table->time('hora');
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
        Schema::dropIfExists('productoinventarios');
    }
}
