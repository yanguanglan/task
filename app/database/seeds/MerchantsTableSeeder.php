<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MerchantsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_CN');

		foreach(range(1, 10) as $index)
		{
			Merchant::create(array(
				'merchantCover' => $faker->imageUrl(320, 188),
				'merchantName' => $faker->company,
				'merchantPhone' => $faker->phoneNumber,
				'merchantMobile' => $faker->phoneNumber,
				'merchantAddress' => $faker->address,
				'merchantInstruction' => $faker->text(100),
				'merchantUrl' => $faker->url,
				));
		}
	}

}