<?php

namespace App\Repositories;

use App\User;
use DB;
use Illuminate\Support\Collection;

/**
 * @method User|null find($id)
 * @method User[]|Collection search($conditions = [], $order = '', $limit = '', $offset = '')
 * @method User|null save($entity)
 */
class UserRepository extends Repository {

	public function __construct() {
		parent::__construct(new User(), 'users');
	}

	/**
	 * @param string $email
	 * @return User|null
	 */
	public function findByEmail($email) {
		$items = $this->search(['email' => mb_strtolower(trim($email))], null, 1);
		return $items->isNotEmpty() ? $items->first() : null;
	}

	/**
	 * @param Collection|User[] $users
	 * @return Collection|User[]
	 */
	public function fillUsersWithCities($users) {
		$cityIds = $users->pluck('city_id')->all();
		$cityIds = array_filter(array_unique($cityIds));
		if (empty($cityIds)) return $users; // no cities

		$cityRepo = new CityRepository();
		$cityIds = implode(',', $cityIds);
		$cities = $cityRepo->search("id IN ($cityIds)")->keyBy('id');

		foreach ($users as $user) {
			$user->city = $cities->get($user->city_id);
		}

		return $users;
	}

	/**
	 * @param User $user
	 * @param int $limit
	 * @return Collection|User[]
	 */
	public function suggestFriendsFor($user, $limit = 7) {
		$users = $this->search([
			"id != {$user->id}",
			"id NOT IN (SELECT right_id FROM friends WHERE left_id={$user->id})",
		], 'id DESC', $limit);
		return $this->fillUsersWithCities($users);
	}

	/**
	 * @param User|int $user
	 * @param User|int $newFriend
	 * @return bool
	 */
	public function addFriendFor($user, $newFriend) {
		$leftId = ($user instanceof User) ? $user->id : (int)$user;
		$rightId = ($newFriend instanceof User) ? $newFriend->id : (int)$newFriend;

		try {
			// не нужно добавлять, если запись уже есть
			$oldRecord = DB::select("SELECT id FROM friends WHERE left_id={$leftId} AND right_id={$rightId} LIMIT 1");
			if (count($oldRecord)) return true; // уже есть запись

			// прямая запись left --> right
			// обратная (встречная) запись right --> left
			$ok = DB::insert("INSERT INTO friends (left_id, right_id) VALUES (?, ?), (?, ?)", [
				$leftId, $rightId,
				$rightId, $leftId,
			]);
			if ($ok <= 0) return false;

		} catch (\Throwable $e) {
			\Log::error($e->getMessage(), [__FILE__, __LINE__, $e->getFile(), $e->getLine()]);
			return false;
		}

		return true;
	}

	/**
	 * @param User|int $user
	 * @param User|int $oldFriend
	 * @return bool
	 */
	public function removeFriendFor($user, $oldFriend) {
		$leftId = ($user instanceof User) ? $user->id : (int)$user;
		$rightId = ($oldFriend instanceof User) ? $oldFriend->id : (int)$oldFriend;

		try {
			// прямая запись left --> right
			// обратная (встречная) запись right --> left
			$ok = DB::delete("DELETE FROM friends WHERE (left_id=? AND right_id=?) OR (left_id=? AND right_id=?)", [
				$leftId, $rightId,
				$rightId, $leftId,
			]);
			if ($ok <= 0) return false;

		} catch (\Throwable $e) {
			\Log::error($e->getMessage(), [__FILE__, __LINE__, $e->getFile(), $e->getLine()]);
			return false;
		}

		return true;
	}

}
