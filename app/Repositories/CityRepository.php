<?php

namespace App\Repositories;

use App\City;
use Illuminate\Support\Collection;

class CityRepository implements Repository {

	/**
	 * @param $id
	 * @return City|null
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
	 * @param City $entity
	 * @return City|null
	 */
	public function save($entity) {
		// TODO: Implement save() method.
		return null;
	}

}
