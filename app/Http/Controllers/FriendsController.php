<?php

namespace App\Http\Controllers;

class FriendsController extends Controller {

	public function index() {
		//$user = ExecutionContext::getUser();
		$user = null;
		return view('mypage', ['user' => $user]);
	}

}
