<?php

namespace App\Http\Controllers;

use App\ExecutionContext;

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
