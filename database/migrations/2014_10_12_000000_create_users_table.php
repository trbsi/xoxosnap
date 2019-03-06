<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->index()->nullable();
            $table->string('username', 20)->unique()->index();
            $table->string('email', 50)->unique()->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->tinyInteger('profile_type');
            $table->tinyInteger('has_notification')->default(0);
            $table->enum('provider', ['twitter', 'facebook'])->nullable();
            $table->bigInteger('provider_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement('CREATE FULLTEXT INDEX ft_name_username ON users(name, username)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
