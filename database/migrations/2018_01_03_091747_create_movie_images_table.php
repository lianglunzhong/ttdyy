<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->string('url');
            $table->boolean('default')->default(0);
            $table->boolean('visible')->default(1);
            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_images');
    }
}
