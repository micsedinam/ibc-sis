<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentid');
            $table->text('term');
            $table->string('academicyear');
            $table->integer('amt_due');
            $table->integer('amt_rem');
            $table->integer('amt_paid');
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
        Schema::dropIfExists('stud_fees');
    }
}
