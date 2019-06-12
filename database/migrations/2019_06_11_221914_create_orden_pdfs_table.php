<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_pdfs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre_pdf');
          $table->integer('orden_id')->unsigned();
          $table->foreign('orden_id')
                ->references('id')
                ->on('ordenes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('orden_pdfs');
    }
}
