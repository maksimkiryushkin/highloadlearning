<?php

namespace App\Repositories;

use App\City;
use Illuminate\Support\Collection;

/**
 * @method City|null find($id)
 * @method City[]|Collection search($conditions = [], $order = '', $limit = '', $offset = '')
 * @method City|null save($entity)
 */
class CityRepository extends Repository {

	public function __construct() {
		parent::__construct(new City(), 'cities');
	}

	/**
	 * @param string $name
	 * @return City|null
	 */
	public function findByName($name) {
		$items = $this->search(['name' => trim($name)], null, 1);
		return $items->isNotEmpty() ? $items->first() : null;
	}

}
