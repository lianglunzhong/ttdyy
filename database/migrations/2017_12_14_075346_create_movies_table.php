<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->string('alias')->nullable()->comment('别名');
            $table->integer('country_id')->unsigned()->comment('国家id');
            $table->integer('duration')->unsigned()->comment('时长');
            $table->decimal('score', 2, 1)->unsigned()->nullable()->comment('评分');
            $table->date('release_time')->nullable()->comment('上映时间');
            $table->string('year')->nullable()->comment('上映年代');
            $table->string('lang')->nullable()->comment('语言');
            $table->string('director')->nullable()->comment('导演');
            $table->string('players')->nullable()->comment('主演');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
