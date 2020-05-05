<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	public function up() {
		$query = <<<QUERY

CREATE TABLE users (
	`id` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(255) NOT NULL DEFAULT '',
	`last_name` VARCHAR(255) NOT NULL DEFAULT '',
	`email` VARCHAR(255) NOT NULL DEFAULT '',
	`password` VARCHAR(255) NOT NULL DEFAULT '',
	`gender` ENUM('none','male','female','other') NOT NULL DEFAULT 'none',
	`birthday` DATE NOT NULL DEFAULT '1900-01-01',
	`city_id` INT NOT NULL DEFAULT 0,
	`interests` TEXT,
	`avatar` TEXT,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

QUERY;
		\DB::statement($query);
	}

	public function down() {
		// nothing
	}

}
