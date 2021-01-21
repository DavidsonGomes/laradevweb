<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('uri');
            $table->string('title');
            $table->string('subtitle');
            $table->string('cover')->nullable();
            $table->text('content');
            $table->integer('views')->default(0);
            $table->unsignedInteger('author');
            $table->timestamps();

            $table->foreign('author')->references('id')->on('users')->onDeleter('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
