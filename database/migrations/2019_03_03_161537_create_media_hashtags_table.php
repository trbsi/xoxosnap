<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaHashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_hashtags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('hashtag_id');

            $table->foreign('media_id')
            ->references('id')
            ->on('media')
            ->onDelete('cascade');

            $table->foreign('hashtag_id')
            ->references('id')
            ->on('hashtags')
            ->onDelete('cascade');

            $table->unique(['media_id', 'hashtag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_hashtags');
    }
}
