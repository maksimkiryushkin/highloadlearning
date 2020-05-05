<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	public function run() {
		$this->call(CitySeeder::class);
		$this->call(UserSeeder::class);
		$this->call(MakeFriends::class);
	}

}
