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
        Schema::create('creates', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nombre');
            $table->string('descripcion',5000);
            $table->string('foto');
            $table->bigInteger('id_categoria')->unsigned()->unique();
            //$table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('set null');
            $table->foreign('id_categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('produtos');
    }
}
