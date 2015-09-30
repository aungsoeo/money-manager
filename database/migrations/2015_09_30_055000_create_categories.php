<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->biginteger('parent_id');
            $table->biginteger('user_id');
            $table->enum('type', array(
                'DEFAULT',
                'CUSTOM'
            ));
            $table->enum('usage_type', array(
                'EXPENSE',
                'INCOME'
            ));
            $table->boolean('is_deleted');
            $table->timestamps();
            $table->index('parent_id');
            $table->index('user_id');
            $table->index('type');
            $table->index('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
