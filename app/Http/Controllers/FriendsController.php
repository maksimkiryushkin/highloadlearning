<?php

namespace App\Http\Controllers;

use App\ExecutionContext;
use App\Repositories\UserRepository;

class FriendsController extends Controller {

	public function index() {
		return view('friends');
	}

	public function friend($id) {
		$userRepo = new UserRepository();
		$person = $userRepo->find($id);
		if (!$person) return abort(404);

		$isFriend = $userRepo->isFriendOf(ExecutionContext::getUser(), $person);
		if (!$isFriend) return redirect("/person/{$person->id}");

		$suggestFriends = $userRepo->suggestFriendsOfPersonFor(ExecutionContext::getUser(), $person);

		return view('person', [
			'person' => $person,
			'isFriend' => $isFriend,
			'suggestFriends' => $suggestFriends,
		]);
	}

	public function person($id) {
		$userRepo = new UserRepository();
		$person = $userRepo->find($id);
		if (!$person) return abort(404);

		$isFriend = $userRepo->isFriendOf(ExecutionContext::getUser(), $person);
		if ($isFriend) return redirect("/friend/{$person->id}");

		$suggestFriends = $userRepo->suggestFriendsOfPersonFor(ExecutionContext::getUser(), $person);

		return view('person', [
			'person' => $person,
			'isFriend' => $isFriend,
			'suggestFriends' => $suggestFriends,
		]);
	}

}
