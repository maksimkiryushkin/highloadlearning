<?php

namespace App\Http\Controllers;

class MainController extends Controller {

	/**
	 * My Page for authorized user
	 */
	public function index() {
		return view('base');
	}

}
