<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunion_empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('reunion_id')->unsigned();
            $table->timestamps();
            $table->foreign('empleado_id')->references('id')->on('empleados')
            ->onDelete('cascade');
            $table->foreign('reunion_id')->references('id')->on('reunions')
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
        Schema::dropIfExists('reunion_empleados');
    }
}
