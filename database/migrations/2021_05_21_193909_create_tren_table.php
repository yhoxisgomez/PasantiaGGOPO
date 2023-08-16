<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tren', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha_llegada')->nullable();

            $table->Integer('turno')->nullable();
            $table->String('lugar_inicial')->nullable();
            $table->Integer('numero')->nullable();
            $table->String('contenido')->nullable();



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
        Schema::dropIfExists('tren');
    }
}
