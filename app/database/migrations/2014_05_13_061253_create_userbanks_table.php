<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserbanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userbanks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->boolean('type');
			$table->string('userName');
			$table->string('idCard')->unllable();
			$table->string('province')->nullable();
			$table->string('city')->nullable();
			$table->string('bankName')->nullable();
			$table->string('depositBank')->nullable();
			$table->string('cardNum');
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
		Schema::drop('userbanks');
	}

}
