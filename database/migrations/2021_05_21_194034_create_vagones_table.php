<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagones', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha_vaciado')->nullable();

            $table->Integer('turno')->nullable();
            $table->Integer('cant_tolva_vaciado')->nullable();
            $table->Integer('cant_disponible_tolva')->nullable();
            $table->Integer('cant_gondola_volteado')->nullable();
            $table->Integer('cant_disponible_gondola')->nullable();
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
        Schema::dropIfExists('vagones');
    }
}
