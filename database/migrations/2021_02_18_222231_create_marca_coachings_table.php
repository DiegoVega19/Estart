<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaCoachingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_coachings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned()->nullable();
            $table->bigInteger('coaching_id')->unsigned()->nullable();
            $table->date('fechaMarcada');
            $table->time('horaMarcada');
            $table->timestamps();
            $table->foreign('empleado_id')->references('id')->on('empleados')
            ->onDelete('set null');
            $table->foreign('coaching_id')->references('id')->on('coachings')
            ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marca_coachings');
    }
}
