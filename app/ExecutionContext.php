<?php

namespace App;

class ExecutionContext {

	protected static $user = null;
	protected static $navActive = null;

	public static function getUser() {
		if (static::$user === null) {
			$userId = request()->session()->get('user');
			// load model here
			//static::$user = User::find($userId);
			static::$user = $userId;
		}
		return static::$user;
	}

	public static function navActive() {
		if (static::$navActive === null) {
			if (request()->is(['/'])) {
				static::$navActive = 'mypage';
			} elseif (request()->is(['friends', 'friends/*'])) {
				static::$navActive = 'friends';
			}
		}
		return static::$navActive;
	}

	public static function setSessionUser($user) {
		$userId = (int)$user;
		request()->session()->put('user', $userId);
	}

	public static function dropSessionUser() {
		request()->session()->forget('user');
	}

}
