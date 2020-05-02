<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Collection;

class UserRepository implements Repository {

	/**
	 * @param $id
	 * @return User|null
	 */
	public function find($id) {
		// TODO: Implement find() method.
		return null;
	}

	/**
	 * @param array|string $conditions
	 * @return Collection
	 */
	public function search($conditions) {
		// TODO: Implement search() method.
		return new Collection();
	}

	/**
	 * @param User $entity
	 * @return User|null
	 */
	public function save($entity) {
		// TODO: Implement save() method.
		return null;
	}

}
