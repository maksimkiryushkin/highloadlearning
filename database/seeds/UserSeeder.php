<?php

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

	public function run() {
		$userCount = DB::selectOne('SELECT COUNT(id) as count FROM users');
		$userCount = $userCount->count ?: 0;

		$userRepo = new UserRepository();
		factory(User::class, 100 - $userCount)->make()->each(function ($user) use ($userRepo) {
			/** @var User $user */
			$user->setFooAvatar();
			$userRepo->save($user);
		});
	}

}
