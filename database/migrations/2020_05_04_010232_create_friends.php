<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriends extends Migration {

	public function up() {
		$query = <<<QUERY

CREATE TABLE friends (
	`id` INT NOT NULL AUTO_INCREMENT,
	`left_id` INT NOT NULL DEFAULT 0,
	`right_id` INT NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

QUERY;
		\DB::statement($query);
	}

	public function down() {
		// nothing
	}

}
