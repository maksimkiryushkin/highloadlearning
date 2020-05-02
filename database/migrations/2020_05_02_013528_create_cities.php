<?php

use Illuminate\Database\Migrations\Migration;

class CreateCities extends Migration {

	public function up() {
		$query = <<<QUERY

CREATE TABLE cities (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

QUERY;
		\DB::statement($query);
	}

	public function down() {
		// nothing
	}

}
