<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Task::create(array(
				'taskName' => $faker->word,
				'taskCover' => $faker->imageUrl(320, 188),
				'receiveCount' => $faker->randomDigitNotNull,
				'incomeCoins' => $faker->randomDigitNotNull,
				'bailCoins' => $faker->randomDigitNotNull,
				'fineCoins' => $faker->randomDigitNotNull,
				'periodDaysCount' => $faker->randomDigitNotNull,
				'transmitCount'=> $faker->randomDigitNotNull,
				'dailyTransmitCount'=> $faker->randomDigitNotNull,
				'taskStartDate'=>$faker->dateTime(),
				'taskEndDate'=>$faker->dateTime(),
				'taskInstruction'=>$faker->text(200),
				'merchant_id' => rand(1,10),
				'type' => $faker->boolean(50),
				'detailType' => $faker->boolean(50),
			));
		}
	}

}