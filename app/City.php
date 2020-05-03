<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @property int $id
 * @property string $name
 */
class City extends Model {

	public $fillable = [
		'name',
	];

	public function beforeSave() {
		$this->name = trim($this->name);
	}

}
