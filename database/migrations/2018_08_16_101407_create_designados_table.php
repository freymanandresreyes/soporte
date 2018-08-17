<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orden_item')->unsigned();
            $table->integer('id_colaborador')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->string('observacion');
            $table->foreign('id_orden_item')->references('id')->on('orden_items');
            $table->foreign('id_colaborador')->references('id')->on('colaboradores');
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
        Schema::dropIfExists('designados');
    }
}
