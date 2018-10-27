<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatedatcontactosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datcontactos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 20);
            $table->string('contacto', 20);
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('datcontactos');
    }
}
