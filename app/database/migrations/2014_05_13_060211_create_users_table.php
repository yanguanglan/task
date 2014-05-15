<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username');
			$table->string('nickname');
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->string('avatar');
			$table->string('phone');
			$table->string('email');
			$table->integer('surplus_coin_num');
			$table->integer('cash_coin_num');
			$table->string('weixin');
			$table->string('sinaweibo');
			$table->string('tencentweibo');
			$table->string('qq');
			$table->string('qqzone');
			$table->string('douban');
			$table->string('renren');
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
		Schema::drop('users');
	}

}
