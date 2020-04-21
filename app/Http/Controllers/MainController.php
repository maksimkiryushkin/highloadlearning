<?php

namespace App\Http\Controllers;

use App\ExecutionContext;

class MainController extends Controller {

	/**
	 * My Page for authorized user
	 */
	public function index() {
		$user = ExecutionContext::getUser();
		return view('mypage', ['user' => $user]);
	}

}
