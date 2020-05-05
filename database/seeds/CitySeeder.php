<?php

use App\City;
use App\Repositories\CityRepository;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder {

	public function run() {
		$cityCount = DB::selectOne('SELECT COUNT(id) as count FROM cities');
		$cityCount = $cityCount->count ?: 0;

		$cityRepo = new CityRepository();
		factory(City::class, 10 - $cityCount)->make()->each(function ($city) use ($cityRepo) {
			$cityRepo->save($city);
		});
	}

}
