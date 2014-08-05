<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accountdetails', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->boolean('type');
			$table->boolean('typeId');
			$table->integer('comeinCoins');
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
		Schema::drop('accountdetails');
	}

}
