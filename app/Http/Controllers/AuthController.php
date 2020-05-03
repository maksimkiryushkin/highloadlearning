<?php

namespace App\Http\Controllers;

use App\City;
use App\ExecutionContext;
use App\Repositories\CityRepository;
use App\Repositories\UserRepository;
use App\User;
use Validator;

class AuthController extends Controller {

	public function welcome() {
		if (ExecutionContext::getUser()) {
			return redirect(route('home'));
		}
		return view('welcome');
	}

	public function register() {
		return view('register');
	}

	public function doRegister() {
		$data = request()->all();

		$validator = Validator::make($data, [
			'name' => 'required|max:250',
			'lastname' => 'required|max:250',
			'birthday' => 'required|date', //|before_or_equal:-14 years
			'gender' => 'required|in:'.implode(',', array_keys(User::GENDERS)),
			'city' => 'required|min:2|max:250',
			//'interests' => 'required',
			'email' => 'required', //|email:filter
			'password' => 'required',
		], [
			'name.*' => 'Пожалуйста, укажите Имя',
			'lastname.*' => 'Пожалуйста, укажите Фамилию',
			'birthday.*' => 'Пожалуйста, укажите свой День рождения',
			'gender.*' => 'Пожалуйста, выберите Пол (хотя бы вариант Без указания пола)',
			'city.*' => 'Пожалуйста, укажите Город',
			'email.*' => 'Пожалуйста, укажите Email, который будет вашим логином',
			'password.*' => 'Пожалуйста, задайте Пароль',
		]);

		if ($validator->fails()) {
			return $this->responseJsonError($validator->errors()->first());
		}

		$cityRepo = new CityRepository();
		$userRepo = new UserRepository();

		// дополнительная проверка на уникальность email'а
		$sameEmailUser = $userRepo->findByEmail($data['email']);
		if ($sameEmailUser) {
			return $this->responseJsonError('Пользователь с таким email\'ом уже зарегистрирован в системе. Восстановите доступ к своему аккаунту или введите другой email');
		}

		$city = $cityRepo->findByName($data['city']);
		if (!$city) {
			$city = new City();
			$city->name = $data['city'];
			if (!$cityRepo->save($city)) {
				return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
			}
		}

		$user = new User();
		$user->first_name = $data['name'];
		$user->last_name = $data['lastname'];
		$user->email = $data['email'];
		$user->password = md5($data['password']);
		$user->gender = $data['gender'] ?: 'none';
		$user->birthday = $data['birthday'];
		$user->city_id = $city->id;
		$user->interests = $data['interests'] ?: '';
		$user->setFooAvatar(false);

		if (!$userRepo->save($user)) {
			return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
		}

		ExecutionContext::setLastLogin($user->email);

		return $this->responseJsonSuccessMessageURL('Спасибо за регистрацию!', '/');
	}

	public function profile() {
		$user = ExecutionContext::getUser();
		return view('profile', ['user' => $user ?: new User()]);
	}

	public function updateProfile() {
		$data = request()->all();

		$validator = Validator::make($data, [
			'name' => 'required|max:250',
			'lastname' => 'required|max:250',
			'birthday' => 'required|date', //|before_or_equal:-14 years
			'gender' => 'required|in:'.implode(',', array_keys(User::GENDERS)),
			'city' => 'required|min:2|max:250',
			//'interests' => 'required',
			'email' => 'required', //|email:filter
			//'password' => 'required',
		], [
			'name.*' => 'Пожалуйста, укажите Имя',
			'lastname.*' => 'Пожалуйста, укажите Фамилию',
			'birthday.*' => 'Пожалуйста, укажите свой День рождения',
			'gender.*' => 'Пожалуйста, выберите Пол (хотя бы вариант Без указания пола)',
			'city.*' => 'Пожалуйста, укажите Город',
			'email.*' => 'Пожалуйста, укажите Email, который будет вашим логином',
			//'password.*' => 'Пожалуйста, задайте Пароль',
		]);

		if ($validator->fails()) {
			return $this->responseJsonError($validator->errors()->first());
		}

		$user = ExecutionContext::getUser();
		if (!$user) {
			return $this->responseJsonError('У вас закончилась сессия. Пожалуйста, авторизуйтесь повторно и повторите действия');
		}

		$cityRepo = new CityRepository();
		$userRepo = new UserRepository();

		// дополнительная проверка на уникальность email'а
		$sameEmailUser = $userRepo->findByEmail($data['email']);
		if ($sameEmailUser && $sameEmailUser->id != $user->id) {
			return $this->responseJsonError('Пользователь с таким email\'ом уже зарегистрирован в системе. Укажите другой email, пожалуйста');
		}

		$city = $cityRepo->findByName($data['city']);
		if (!$city) {
			$city = new City();
			$city->name = $data['city'];
			if (!$cityRepo->save($city)) {
				return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
			}
		}

		$user->first_name = $data['name'];
		$user->last_name = $data['lastname'];
		$user->email = $data['email'];
		if ($data['password']) $user->password = md5($data['password']);
		$user->gender = $data['gender'] ?: 'none';
		$user->birthday = $data['birthday'];
		$user->city_id = $city->id;
		$user->interests = $data['interests'] ?: '';
		$user->setFooAvatar(false);

		if (!$userRepo->save($user)) {
			return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
		}

		ExecutionContext::setLastLogin($user->email);

		return $this->responseJsonSuccessMessageURL('Изменения сохранены успешно!', '/');
	}

	public function login() {
		$data = request()->all();

		$validator = Validator::make($data, [
			'login' => 'required', //|email:filter
			'password' => 'required',
		], [
			'login.*' => 'Укажите Email, пожалуйста',
			'password.*' => 'Укажите Пароль, пожалуйста',
		]);

		if ($validator->fails()) {
			return $this->responseJsonError($validator->errors()->first());
		}

		$userRepo = new UserRepository();

		$user = $userRepo->findByEmail($data['login']);
		if (!$user) {
			return $this->responseJsonError('Пользователь с указанным email\'ом не зарегистрирован. Пройдите регистрацию, пожалуйста');
		}

		if ($user->password !== md5($data['password'])) {
			return $this->responseJsonError('Неправильный пароль');
		}

		ExecutionContext::setSessionUser($user);
		ExecutionContext::setLastLogin($user->email);

		return $this->responseJsonSuccessMessageURL('Добро пожаловать!', '/');
	}

	public function logout() {
		ExecutionContext::dropSessionUser();
		return redirect(route('welcome'));
	}

}
