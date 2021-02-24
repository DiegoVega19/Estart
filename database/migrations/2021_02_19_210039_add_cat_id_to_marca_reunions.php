<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatIdToMarcaReunions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marca_reunions', function (Blueprint $table) {
            $table->bigInteger('cat_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('cat_marca_reunions')
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
        Schema::table('marca_reunions', function (Blueprint $table) {
            //
        });
    }
}
