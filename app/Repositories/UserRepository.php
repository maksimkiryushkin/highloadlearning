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

}
