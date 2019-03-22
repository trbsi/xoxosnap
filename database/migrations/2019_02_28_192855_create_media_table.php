<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('file', 100);
            $table->string('external_file', 255)->nullable();
            $table->string('thumbnail', 100)->nullable();
            $table->integer('cost')->default(0)->comment('in dollars');
            $table->integer('duration')->default(0)->comment('seconds');
            $table->datetime('expires_at')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('purchased_count')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        DB::statement('CREATE FULLTEXT INDEX title_description ON media(title, description)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
