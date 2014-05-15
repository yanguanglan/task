<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_CN');

		foreach(range(1, 10) as $index)
		{
			$name = $faker->name;
			User::create(array(
				'username' => $name,
				'nickname' => $name,
				'password' => Hash::make('password'),
				'email' => $faker->email,
				'phone' => $faker->phoneNumber,
				'avatar' => $faker->imageUrl(40, 40),
				'surplus_coin_num' => $faker->randomDigitNotNull,
				'cash_coin_num' => $faker->randomDigitNotNull, 
				'weixin' => $faker->domainWord,
				'sinaweibo' => $faker->domainWord,
				'tencentweibo' => $faker->domainWord,
				'qq' => $faker->domainWord,
				'qqzone' => $faker->domainWord,
				'douban' => $faker->domainWord,
				'renren' => $faker->domainWord,
			));
		}
	}

}