<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('content_id');
            $table->text('message');
            $table->integer('parent_id');
            $table->string('ip');
            $table->string('status');
            $table->timestamps();
            $table->index(['user_id', 'content_id', 'status', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
