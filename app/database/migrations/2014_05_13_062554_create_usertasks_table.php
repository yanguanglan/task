<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsertasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_task', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('task_id');
			$table->boolean('status');
			$table->string('process');
			$table->timestamp('completed_at');
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
		Schema::drop('user_task');
	}

}
