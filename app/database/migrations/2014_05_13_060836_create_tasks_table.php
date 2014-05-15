<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->string('taskName');
			$table->string('taskCover');
			$table->integer('receiveCount');
			$table->integer('incomeCoins');
			$table->integer('bailCoins');
			$table->integer('fineCoins');
			$table->integer('periodDaysCount');
			$table->integer('transmitCount');
			$table->integer('dailyTransmitCount');
			$table->datetime('taskStartDate');
			$table->datetime('taskEndDate');
			$table->text('taskInstruction');
			$table->integer('merchant_id');
			$table->boolean('type');
			$table->boolean('detailType');
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
		Schema::drop('tasks');
	}

}
