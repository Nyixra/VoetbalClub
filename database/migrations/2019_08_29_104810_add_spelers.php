<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpelers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spelers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('club_naam');
            $table->integer('aantal_spelers');
            $table->integer('positie');
            $table->softDeletes();
            $table->foreign('club_naam')->references('naam')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clubs');
    }
}
