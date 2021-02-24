<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cargo_id')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('codigoEmpleado');
            $table->string('sexo',1);
            $table->integer('edad');
            $table->timestamps();
            $table->foreign('cargo_id')->references('id')->on('cargos')
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
        Schema::dropIfExists('empleados');
    }
}
