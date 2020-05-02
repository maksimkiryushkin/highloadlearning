<?php

namespace App;

use App\Repositories\UserRepository;

class ExecutionContext {

	protected static $user = null;
	protected static $navActive = null;

	public static function getUser() {
		if (static::$user === null) {
			$userId = request()->session()->get('userId');
			static::$user = (new UserRepository())->find($userId);
		}
		return static::$user;
	}

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

}
