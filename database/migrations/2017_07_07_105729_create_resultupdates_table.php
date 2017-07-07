<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultupdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultupdates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studid');
            $table->string('staffid');
            $table->integer('resultid')->index()->unsigned();
            $table->integer('requestid')->index()->unsigned();
            $table->integer('ca_score');
            $table->integer('exam_score');
            $table->enum('state',['pending','approved','denied']);
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
        Schema::dropIfExists('resultupdates');
    }
}
