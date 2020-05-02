<?php

namespace App\Http\Controllers;

use App\ExecutionContext;
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
			'gender' => 'required|in:none,male,female,other',
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

		$userRepo = new UserRepository();

		// дополнительная проверка на уникальность email'а
		$sameEmailUser = $userRepo->findByEmail($data['email']);
		if ($sameEmailUser) {
			return $this->responseJsonError('Пользователь с таким email\'ом уже зарегистрирован в системе. Восстановите доступ к своему аккаунту или введите другой email');
		}

		$user = new User();
		$user->first_name = $data['name'];
		$user->last_name = $data['lastname'];
		$user->email = $data['email'];
		$user->password = md5($data['password']);
		$user->gender = $data['gender'] ?: 'none';
		$user->birthday = $data['birthday'];
		$user->city_id = 0;
		$user->interests = $data['interests'] ?: '';

		if (!$userRepo->save($user)) {
			return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
		}

		return $this->responseJsonSuccessMessageURL('Спасибо за регистрацию!', '/');
	}

	public function profile() {
		return view('profile');
	}

	public function login() {
		dump('login');
		ExecutionContext::setSessionUser(1);
	}

	public function logout() {
		ExecutionContext::dropSessionUser();
		return redirect(route('welcome'));
	}

}
