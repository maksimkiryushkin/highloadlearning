<?php

namespace App\Http\Controllers;

use App\ExecutionContext;
use App\Repositories\UserRepository;

class FriendsController extends Controller {

	const FRIENDS_ON_ONE_PAGE = 10;

	public function index() {
		$userRepo = new UserRepository();
		$friends = $userRepo->friendsOf(ExecutionContext::getUser(), 0, self::FRIENDS_ON_ONE_PAGE);
		$hasMore = $friends->count() >= self::FRIENDS_ON_ONE_PAGE;

		return view('friends', ['friends' => $friends, 'hasMore' => $hasMore]);
	}

	public function friendsMore($page) {
		$offset = $page * self::FRIENDS_ON_ONE_PAGE;
		$userRepo = new UserRepository();
		$friends = $userRepo->friendsOf(ExecutionContext::getUser(), $offset, self::FRIENDS_ON_ONE_PAGE);
		$hasMore = $friends->count() >= self::FRIENDS_ON_ONE_PAGE;

		$items = view('friends-list', ['friends' => $friends]);

		return $this->responseJsonSuccess([
			'items' => (string)$items,
			'hasMore' => $hasMore,
		]);
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

	public function makeFriendship($id) {
		$userRepo = new UserRepository();
		$person = $userRepo->find($id);
		if (!$person) return $this->responseJsonError('Указан какой-то ненастоящий человек. Попробуйте обновить страницу и повторить действие');

		if (!$userRepo->addFriendFor(ExecutionContext::getUser(), $person)) {
			return $this->responseJsonError('Не удалось сохранить запись в БД. Попробуйте повторить операцию позже...');
		}

		return $this->responseJsonSuccessMessageURL('Подружились!', "/friend/{$person->id}");
	}

	public function unfriend($id) {
		$userRepo = new UserRepository();
		$person = $userRepo->find($id);
		if (!$person) return $this->responseJsonError('Указан какой-то ненастоящий человек. Попробуйте обновить страницу и повторить действие');

		if (!$userRepo->removeFriendFor(ExecutionContext::getUser(), $person)) {
			return $this->responseJsonError('Не удалось сохранить изменения в БД. Попробуйте повторить операцию позже...');
		}

		return $this->responseJsonSuccessMessageURL('Больше не друзья!', "/person/{$person->id}");
	}

}
