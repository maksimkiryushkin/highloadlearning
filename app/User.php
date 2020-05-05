<?php

namespace App;

use App\Repositories\CityRepository;
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
 * @property string $avatar
 */
class User extends Model {

	/** @var City */
	public $city = null;

	public $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'gender',
		'birthday',
		'city_id',
		'interests',
		'avatar',
	];

	const GENDERS = [
		'none' => 'Без указания пола',
		'male' => 'Мужской',
		'female' => 'Женский',
		'other' => 'Другой',
	];

	public function beforeSave() {
		$this->email = mb_strtolower(trim($this->email));
		if (empty($this->avatar)) $this->avatar = '/img/anonymous_any.png';
		return true;
	}

	public function loadCity() {
		$cityRepo = new CityRepository();
		$this->city = $cityRepo->find($this->city_id);
	}

	private static $_maleAvatars = null;
	private static $_femaleAvatars = null;

	/**
	 * Выставляет аватарку по полу. Если указано $random=true, тогда берёт случайную
	 * заготовленную заранее картинку, её и выставляет.
	 *
	 * @param bool $random
	 */
	public function setFooAvatar($random = true) {
		if (!in_array($this->gender, ['male', 'female'])) {
			$this->avatar = '/img/anonymous_any.png';

		} elseif ($random) {
			if (!self::$_maleAvatars && !self::$_femaleAvatars) srand(time());

			$publicDirPathLength = mb_strlen(public_path());
			if ($this->gender == 'male') {
				if (!self::$_maleAvatars) {
					self::$_maleAvatars = \File::glob(public_path('img/male/*'));
					self::$_maleAvatars = array_map(function ($path) use ($publicDirPathLength) {
						return mb_substr($path, $publicDirPathLength);
					}, self::$_maleAvatars);
				}
				$files = self::$_maleAvatars;
			} else { // female
				if (!self::$_femaleAvatars) {
					self::$_femaleAvatars = \File::glob(public_path('img/female/*'));
					self::$_femaleAvatars = array_map(function ($path) use ($publicDirPathLength) {
						return mb_substr($path, $publicDirPathLength);
					}, self::$_femaleAvatars);
				}
				$files = self::$_femaleAvatars;
			}

			$index = rand(0, count($files) - 1);
			$this->avatar = $files[$index];

		} elseif ($this->gender == 'male') {
			$this->avatar = '/img/anonymous_male.png';

		} else { // female
			$this->avatar = '/img/anonymous_female.png';
		}
	}

	public function age() {
		$birthday = convertAnyToCarbon($this->birthday);
		return $birthday->diffInYears('now');
	}

	public function cityFormated() {
		if (!$this->city) $this->loadCity();
		return $this->city ? $this->city->name : '';
	}

	public function genderFormated() {
		return self::GENDERS[$this->gender] ?? self::GENDERS['none'];
	}

	public function nameFormated() {
		$name = Str::ucfirst(mb_strtolower($this->first_name)).' '.Str::ucfirst(mb_strtolower($this->last_name));
		return trim($name);
	}

}
