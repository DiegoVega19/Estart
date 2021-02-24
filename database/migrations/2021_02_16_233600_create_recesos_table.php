<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recesos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned()->nullable();
            $table->bigInteger('categoriaReceso_id')->unsigned()->nullable();
            $table->date('fechaMarcada');
            $table->time('horaMarcada');
            $table->timestamps();
            $table->foreign('categoriaReceso_id')->references('id')->on('categoria_recesos')
            ->onDelete('set null');
            $table->foreign('empleado_id')->references('id')->on('empleados')
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
        Schema::dropIfExists('recesos');
    }
}
