<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('alt_text');
            $table->string('filename');
            $table->string('mime');
            $table->integer('size');
            $table->string('type');
            $table->string('credit_name');
            $table->string('credit_url');
            $table->timestamps();
            $table->index(['title', 'filename', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
