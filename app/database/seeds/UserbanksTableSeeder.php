<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserbanksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_CN');

		$users = User::all();

		foreach($users as $user)
		{
			Userbank::create(array(
				'user_id' => $user->id,
				'type' => $faker->boolean(50),
				'userName' => $user->nickname,
				'idCard'=> $faker->creditCardNumber,
				'province'=>$faker->country,
				'city'=> $faker->city,
				'depositBank' => $faker->title, 
				'cardNum' => $faker->creditCardNumber
			));
		}
	}

}