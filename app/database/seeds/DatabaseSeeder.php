<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('TasksTableSeeder');
		$this->call('MerchantsTableSeeder');
		$this->call('UserbanksTableSeeder');
		$this->call('UsercashesTableSeeder');
		$this->call('UsertasksTableSeeder');
	}

}
