<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->text('url')->nullable();
            $table->date('date')->nullable();
            $table->time('first_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('prefectures')->nullable();
            $table->text('body')->nullable();
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['first_time', 'end_time', 'prefectures']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
