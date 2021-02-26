<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_data', function (Blueprint $table) {
            $table->id();
            $table->string('Satisfaccion');
            $table->string('Solucion');
            $table->string('TiempoCalculado');
            $table->string('SatisfaccionCalculado');
            $table->string('SolucionCalculada');
            $table->string('Tiempo');
            $table->string('Total');
            $table->integer('TotalRedondeado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_data');
    }
}
