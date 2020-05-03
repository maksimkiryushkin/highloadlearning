<?php

namespace App;

use App\Repositories\UserRepository;

class ExecutionContext {

	protected static $user = null;
	protected static $navActive = null;

	/**
	 * @return User|null
	 */
	public static function getUser() {
		if (static::$user === null) {
			$userId = request()->session()->get('userId');
			static::$user = (new UserRepository())->find($userId);
		}
		return static::$user;
	}

	/**
	 * @return string
	 */
	public static function navActive() {
		if (static::$navActive === null) {
			if (request()->is(['/'])) {
				static::$navActive = 'mypage';

			} elseif (request()->is(['friends', 'friend/*'])) {
				static::$navActive = 'friends';

			} else {
				static::$navActive = 'none';
			}
		}
		return static::$navActive;
	}

	public static function setSessionUser($user) {
		$userId = ($user instanceof User) ? $user->id : (int)$user;
		request()->session()->put('userId', $userId);
	}

	public static function dropSessionUser() {
		request()->session()->forget('userId');
	}

	public static function setLastLogin($login) {
		request()->session()->put('lastLogin', (string)$login);
	}

	public static function getLastLogin() {
		return request()->session()->get('lastLogin');
	}

}
