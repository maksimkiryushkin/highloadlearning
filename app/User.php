<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property string $birthday
 * @property int $city_id
 * @property string $interests
 */
class User extends Model {

	public $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'gender',
		'birthday',
		'city_id',
		'interests',
	];

	public function beforeSave() {
		$this->email = mb_strtolower(trim($this->email));
		return true;
	}

	public function nameFormated() {
		$name = Str::ucfirst(mb_strtolower($this->first_name)).' '.Str::ucfirst(mb_strtolower($this->last_name));
		return trim($name);
	}

}
