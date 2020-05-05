<?php

use App\Repositories\UserRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MakeFriends extends Seeder {

	public function run() {
		// связываем дружбой пользователей пачками по 1000 человек
		$usersPackIndex = 0;
		$usersInPack = 1000;

		$userRepo = new UserRepository();
		$faker = Factory::create();

		while (true) {
			$packOffset = $usersPackIndex * $usersInPack;
			$userIds = DB::select("SELECT id FROM users ORDER BY id LIMIT $usersInPack OFFSET $packOffset");
			$userIds = array_column($userIds, 'id');
			if (empty($userIds)) break;

			foreach ($userIds as $userId) {
				$friendsHave = DB::selectOne("SELECT COUNT(id) as count FROM friends WHERE left_id={$userId}");
				$friendsHave = $friendsHave->count ?: 0;

				// не очень точно, но нам и не нужно совсем точно
				$targetFriendCount = $faker->numberBetween(5, 20);
				//dump("$targetFriendCount friends for $userId");
				for (;$friendsHave < $targetFriendCount; ++$friendsHave) {
					$friendId = $faker->randomElement($userIds);
					if ($friendId == $userId) continue;
					$userRepo->addFriendFor($userId, $friendId);
				}
			}

			++$usersPackIndex;
		}
	}

}
