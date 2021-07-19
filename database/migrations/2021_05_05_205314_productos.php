<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nombre');
            $table->string('descripcion',5000);
            $table->string('foto');
            $table->string('ref');
            $table->string('fichatecnica');
            $table->string('talla');
            $table->bigInteger('id_categoria')->unsigned();
            $table->unsignedBigInteger('id_tipo');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_tipo')->references('id')->on('tipo');
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
        Schema::dropIfExists('productos');

    }
}
