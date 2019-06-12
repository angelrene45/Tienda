<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();;
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('precio');
            $table->enum('moneda',['USD','MXN','EUR'])->default('MXN');
            $table->string('stock');
            $table->integer('categoria_id')->unsigned();
            $table->integer('vendido')->default(0);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
