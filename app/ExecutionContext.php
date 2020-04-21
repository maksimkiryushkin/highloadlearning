<?php

namespace App;

class ExecutionContext {

	protected static $user = null;

	public static function getUser() {
		if (static::$user === null) {
			$userId = request()->session()->get('user');
			// load model here
			//static::$user = User::find($userId);
			static::$user = $userId;
		}
		return static::$user;
	}

	public static function setSessionUser($user) {
		$userId = (int)$user;
		request()->session()->put('user', $userId);
	}

	public static function dropSessionUser() {
		request()->session()->forget('user');
	}

}
