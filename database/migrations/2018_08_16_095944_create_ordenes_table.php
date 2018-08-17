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
            $table->integer('consecutivo');
            $table->integer('id_area_solicita')->unsigned();
            $table->integer('id_area_destino')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_area_solicita')->references('id')->on('area_users');
            $table->foreign('id_area_destino')->references('id')->on('area_users');
            $table->foreign('id_estado')->references('id')->on('estados');
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
