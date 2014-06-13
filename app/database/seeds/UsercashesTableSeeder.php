<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsercashesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_CN');

		$users = User::all();

		foreach($users as $user)
		{
			Usercash::create(array(
				'user_id' => $user->id,
				'userbank_id' => rand(1, 10),
				'cashCoins' => $faker->randomDigitNotNull,
				'status'=> $faker->boolean(50),
				'comment'=> $faker->text(15),
			));
		}
	}
}