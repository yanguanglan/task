<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsercashesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usercashes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('userbank_id');
			$table->integer('cashCoins');
			$table->boolean('status')->default(0);
			$table->text('comment')->nullable();
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
		Schema::drop('usercashes');
	}

}
