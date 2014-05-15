<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsertasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_CN');

		foreach(range(1, 50) as $index)
		{
			DB::insert('insert into user_task (user_id, task_id, status, process, completed_at) values (?, ?, ?, ? , ?)', array(rand(1, 10), rand(1, 10), 
				$faker->boolean(50), rand(1,100), $faker->dateTime()));
		}
	}

}