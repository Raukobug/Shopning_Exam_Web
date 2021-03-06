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
            $table->increments('id');
			$table->integer('shop_id')->unsigned()->nullable();
			$table->foreign('shop_id')->references('id')->on('shop');
			$table->integer('access_level_id')->unsigned();
			$table->foreign('access_level_id')->references('id')->on('access_level');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->string('phone');
			$table->string('password');
			$table->rememberToken();
            $table->timestamps();
        });
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
