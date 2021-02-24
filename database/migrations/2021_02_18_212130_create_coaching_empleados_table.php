<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachingEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaching_empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('coaching_id')->unsigned();
            $table->timestamps();
            $table->foreign('empleado_id')->references('id')->on('empleados')
            ->onDelete('cascade');
            $table->foreign('coaching_id')->references('id')->on('coachings')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaching_empleados');
    }
}
