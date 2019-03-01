<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories_media', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('story_id');
            $table->string('file', 100);
            $table->timestamps();

            $table->foreign('story_id')
            ->references('id')
            ->on('stories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories_media');
    }
}
