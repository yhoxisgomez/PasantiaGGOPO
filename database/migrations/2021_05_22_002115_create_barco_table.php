<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barco', function (Blueprint $table) {
            $table->id();
            $table->String('nombre')->nullable();
            $table->Date('fecha_inicio')->nullable();
            $table->Date('fecha_fin')->nullable();
            $table->integer('turno_inicio')->nullable();
            $table->integer('turno_fin')->nullable();
            $table->String('lugar_carga')->nullable();
            $table->String('tipo_barco')->nullable();
            $table->integer('toneladas_fmo')->nullable();
            $table->integer('toneladas_cliente')->nullable();

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
        Schema::dropIfExists('barco');
    }
}
