<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchants', function(Blueprint $table) {
			$table->increments('id');
			$table->string('merchantCover');
			$table->string('merchantName');
			$table->string('merchantPhone');
			$table->string('merchantMobile');
			$table->string('merchantAddress');
			$table->text('merchantInstruction');
			$table->string('merchantUrl');
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
		Schema::drop('merchants');
	}

}
