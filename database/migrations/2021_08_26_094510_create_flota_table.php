<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flota', function (Blueprint $table) {
            $table->id();
            $table->integer('flotaLocomotora4HP')->nullable();
            $table->integer('flotaLocomotora2HP')->nullable();
            $table->integer('flotaVagonesTolva')->nullable();
            $table->integer('flotaVagonesGondola')->nullable();
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
        Schema::dropIfExists('flota');
    }
}
