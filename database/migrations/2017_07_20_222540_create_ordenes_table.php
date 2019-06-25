<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guias');
            $table->enum('estatus',['En validacion','Validada','En transito','Completa'])->default('En validacion');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->integer('user_comp_id')->unsigned();
            $table->foreign('user_comp_id')
                  ->references('id')
                  ->on('users');
            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')
                  ->references('id')
                  ->on('direcciones');
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
        Schema::dropIfExists('ordenes');
    }
}
