<?php

namespace App\Http\Controllers;

use App\ExecutionContext;
use App\Repositories\UserRepository;

class MainController extends Controller {

	/**
	 * My Page for authorized user
	 */
	public function index() {
		$user = ExecutionContext::getUser();

		$userRepo = new UserRepository();
		$suggestFriends = $userRepo->suggestFriendsFor($user);
		$mostActiveFriends = $userRepo->mostActiveFriendsFor($user);

		return view('mypage', [
			'user' => $user,
			'suggestFriends' => $suggestFriends,
			'mostActiveFriends' => $mostActiveFriends,
		]);
	}

}
