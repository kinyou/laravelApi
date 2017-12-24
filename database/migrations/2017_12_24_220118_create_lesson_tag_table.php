<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_tag', function (Blueprint $table) {
            $table->increments('id');
            //建立lesson_id索引
            $table->integer('lesson_id')->unsigned()->index();
            //建立外键,包括关联删除
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');

            //建立tag_id索引
            $table->integer('tag_id')->unsigned()->index();
            //建立外键,包括关联删除
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_tag');
    }
}
