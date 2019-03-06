<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('picture', 255)->nullable();
            $table->integer('followers')->default(0);
            $table->integer('videos')->default(0);
            $table->text('description')->nullable();
            $table->date('birthday')->nullable();
            $table->string('current_city', 50)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('business_email', 50)->nullable();
            $table->tinyInteger('badge')->default(1);
            $table->string('website', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('instagram', 50)->nullable();
            $table->string('twitter', 50)->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('users_profiles');
    }
}
