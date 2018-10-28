<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedireccionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('calle');
            $table->string('numeroExt', 5);
            $table->string('numeroInt', 5);
            $table->integer('estado_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->string('colonia');
            $table->integer('codpostal');
            $table->text('referencias');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('estado_id')->references('id')->on('catestados');
            $table->foreign('municipio_id')->references('id')->on('catmunicipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('direcciones');
    }
}
