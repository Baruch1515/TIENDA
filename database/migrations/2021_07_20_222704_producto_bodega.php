<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoBodega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_bodegas', function (Blueprint $table) {
            $table->id()->unique();
            $table->bigInteger('id_bodega')->unsigned();
            $table->bigInteger('id_producto')->unsigned();

            $table->string('stock');
            $table->foreign('id_bodega')->references('id')->on('bodegas');
            $table->foreign('id_producto')->references('id')->on('productos');

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
        Schema::dropIfExists('productos_bodegas');
    }
}
