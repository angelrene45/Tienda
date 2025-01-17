<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->decimal('precio',5,2);
            $table->enum('moneda',['USD','MXN','EUR'])->default('MXN');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos');
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')
                  ->references('id')
                  ->on('ordenes')
                  ->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_items');
    }
}
