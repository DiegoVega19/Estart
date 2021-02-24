<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatIdToMarcaCoachings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marca_coachings', function (Blueprint $table) {
            $table->bigInteger('cat_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('cat_marca_coachings')
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
        Schema::table('marca_coachings', function (Blueprint $table) {
            //
        });
    }
}
