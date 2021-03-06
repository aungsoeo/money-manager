<?php

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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password', 60);
            $table->boolean('is_deleted');
            $table->boolean('is_blocked');
            $table->enum('type', array(
                'USER',
                'ADMIN'
            ));
            $table->rememberToken();
            $table->timestamps();
            $table->index('email');
            $table->index('is_deleted');
            $table->index('is_blocked');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
