<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resultid')->unsigned()->index();
            $table->string('studid');
            $table->string('staffid');
            $table->enum('state',['pending','accepted','updated','denied']);
            $table->enum('type',['request','update']);
            $table->string('request');
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
        Schema::dropIfExists('resultchanges');
    }
}
