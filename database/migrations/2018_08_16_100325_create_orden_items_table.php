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
            $table->integer('id_orden')->unsigned();
            $table->integer('id_item')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->string('observacion');
            $table->foreign('id_orden')->references('id')->on('ordenes');
            $table->foreign('id_item')->references('id')->on('items');
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
        Schema::dropIfExists('orden_items');
    }
}
