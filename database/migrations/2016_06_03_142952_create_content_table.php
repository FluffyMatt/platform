<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function(Blueprint $table) {
            $table->increments('id');
			$table->string('type')->index();
            $table->integer('parent_id');
            $table->string('slug')->unique();
            $table->string('status');
            $table->boolean('seo_index');
            $table->string('title');
            $table->string('seo_title');
            $table->string('description');
            $table->string('seo_description');
            $table->text('body');
			$table->boolean('commenting');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->index(['title', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content');
    }
}
