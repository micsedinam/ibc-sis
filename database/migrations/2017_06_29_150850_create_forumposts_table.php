<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forumposts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('forum_title');
            $table->string('forum_category');
            $table->text('forum_body');
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->integer('staff_id');
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
        Schema::dropIfExists('forumposts');
    }
}
