<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocomotora4hpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locomotora4hp', function (Blueprint $table) {
            $table->id();
            $table->Date('fecha')->nullable();
            $table->Integer('cant_disponible_pto')->nullable();
            $table->Integer('cant_disponible_mina')->nullable();

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
        Schema::dropIfExists('locomotora4hp');
    }
}
