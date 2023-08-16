<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camion', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha')->nullable();
            $table->integer('turno')->nullable();
            $table->Integer('viajes')->nullable();
            $table->Integer('toneladas')->nullable();
            $table->timestamps();

             //RELACION CON ENTIDAD CLIENTE
             $table->unsignedInteger('cliente_id')->nullable();
             $table->foreign('cliente_id')->references('id')->on ('clientes')
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
        Schema::dropIfExists('camion');
    }
}
