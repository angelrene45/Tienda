<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('talla');
            $table->timestamps();
        });

         //Tabla pivot para las tallas

            Schema::create('producto_talla', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('producto_id')->unsigned();
                $table->integer('talla_id')->unsigned();
                $table->timestamps();

                $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
                $table->foreign('talla_id')->references('id')->on('tallas')->onDelete('cascade');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tallas');
    }
}
