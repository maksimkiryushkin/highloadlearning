<?php

namespace App\Http\Controllers;

use App\ExecutionContext;

class AuthController extends Controller {

	public function welcome() {
		if (ExecutionContext::getUser()) {
			return redirect(route('home'));
		}

		return view('base');
	}

	public function login() {
		dump('login');
		ExecutionContext::setSessionUser(1);
	}

	public function logout() {
		dump('logout');
		ExecutionContext::dropSessionUser();
	}

}
