<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$cityIds = DB::select('SELECT id FROM cities');
$cityIds = array_column($cityIds, 'id');

$enFaker = \Faker\Factory::create('en_US');

$factory->define(User::class, function (Faker $faker) use ($cityIds, $enFaker) {
	$gender = ($faker->randomDigit % 2) ? 'male' : 'female';
	return [
		'first_name' => $faker->firstName($gender),
		'last_name' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'password' => md5(md5($faker->randomNumber(5))),
		'gender' => $gender,
		'birthday' => $faker->dateTimeBetween('-42 years', '-20 years')->format('Y-m-d'),
		'city_id' => $faker->randomElement($cityIds),
		'interests' => $enFaker->realText(300, 3),
		'avatar' => '', // will be replaced in seeder
	];
});
