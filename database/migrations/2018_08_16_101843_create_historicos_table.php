<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rechazado')->unsigned();
            $table->integer('id_orden')->unsigned();
            $table->integer('id_area_enviada')->unsigned();
            $table->foreign('id_rechazado')->references('id')->on('area_users');
            $table->foreign('id_orden')->references('id')->on('ordenes');
            $table->foreign('id_area_enviada')->references('id')->on('area_users');
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
        Schema::dropIfExists('historicos');
    }
}
