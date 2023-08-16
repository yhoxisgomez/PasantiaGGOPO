<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha')->nullable();
            $table->integer('turno')->nullable();
            $table->String('lugar')->nullable();
            $table->integer('vagones')->nullable();
            $table->integer('toneladas')->nullable();

            $table->timestamps();

             //RELACION CON ENTIDAD CLIENTE
             $table->unsignedInteger('cliente_id')->nullable();
             $table->foreign('cliente_id')->references('id')->on ('clientes')
             ->onUpdate('cascade')
             ->onDelate('cascade');


             //RELACION CON ENTIDAD MINERAL

             $table->unsignedInteger('mineral_id')->nullable();
             $table->foreign('mineral_id')->references('id')->on ('mineral')
             ->onUpdate('cascade')
             ->onDelate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}
