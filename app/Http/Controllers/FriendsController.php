<?php

namespace App\Http\Controllers;

class FriendsController extends Controller {

	public function index() {
		return view('friends');
	}

	public function friend($id) {
		return view('person', ['isFriend' => true]);
	}

	public function person($id) {
		return view('person', ['isFriend' => false]);
	}

}
