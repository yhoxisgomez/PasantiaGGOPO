<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlotaActualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flota_actual', function (Blueprint $table) {
            $table->id();
            $table->integer('flotaLocomotora4HP_actual')->nullable();
            $table->integer('flotaLocomotora2HP_actual')->nullable();
            $table->integer('flotaVagonesTolva_actual')->nullable();
            $table->integer('flotaVagonesGondola_actual')->nullable();
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
        Schema::dropIfExists('flota_actual');
    }
}
