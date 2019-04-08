<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosEnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos__envio', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('codigo_postal');
            $table->string('colonia');
            $table->string('calle');
            $table->string('numero_exterior');
            $table->string('estado');
            $table->string('telefono');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos__envio');
    }
}
