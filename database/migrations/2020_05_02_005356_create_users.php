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
	`bithday` DATE NOT NULL DEFAULT CURRENT_DATE,
	`city_id` INT NOT NULL DEFAULT 0,
	`interests` TEXT NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

QUERY;
		\DB::statement($query);
	}

	public function down() {
		// nothing
	}

}
