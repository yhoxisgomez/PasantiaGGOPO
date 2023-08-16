<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demoras', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha')->nullable();

            $table->Integer('turno')->nullable();
            $table->String('departamento')->nullable(); //FFCC o PMH
            $table->String('descripcion')->nullable();
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
        Schema::dropIfExists('demoras');
    }
}
