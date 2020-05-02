<?php

namespace App\Repositories;

use App\User;
use DB;
use Illuminate\Support\Collection;

class UserRepository implements Repository {
	use InsertAndGetId;

	/**
	 * @param $id
	 * @return User|null
	 */
	public function find($id) {
		// TODO: Implement find() method.
		return null;
	}

	/**
	 * @param string $email
	 * @return User|null
	 */
	public function findByEmail($email) {
		$items = $this->search(['email' => mb_strtolower(trim($email))]);
		return $items->isNotEmpty() ? $items->first() : null;
	}

	/**
	 * @param array $conditions
	 * @param array|string|null $order
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return Collection|null
	 */
	public function search($conditions = [], $order = null, $limit = null, $offset = null) {
		try {
			$bindings = [];

			$whereAnd = [];
			foreach ($conditions as $key => $val) {
				if (is_numeric($key)) {
					// считаем, что $val -- raw-строка условия
					$whereAnd[] = $val;

				} else {
					$whereAnd[] = "$key=?";
					$bindings[] = $val;
				}
			}
			$where = $whereAnd ? 'WHERE '.implode(' AND ', $whereAnd) : '';


			$order = trim(is_array($order) ? implode(', ', $order) : (string)$order);
			if ($order) $order = "ORDER BY $order";

			$limit = $limit ? "LIMIT $limit" : '';
			$offset = $offset ? "OFFSET $offset" : '';

			$items = DB::select("SELECT * FROM users $where $order $limit $offset", $bindings);
		} catch (\Throwable $e) {
			\Log::error($e->getMessage(), [__FILE__, __LINE__, $e->getFile(), $e->getLine()]);
			return null;
		}

		$result = new Collection();

		$model = new User();
		foreach ($items as $item) {
			$instance = $model->newFromBuilder($item);
			$result->push($instance);
		}

		return  $result;
	}

	/**
	 * @param User $entity
	 * @return User|null
	 */
	public function save($entity) {
		if ($entity->beforeSave() === false) return null;

		$valueMap = [];
		foreach ($entity->fillable as $field) {
			$valueMap[$field] = $entity->$field;
		}

		try {
			if ($entity->id) {
				// update
				$fieldsPart = implode(', ', array_map(function ($key) {
					return "$key=?";
				}, array_keys($valueMap)));

				$query = "UPDATE users SET $fieldsPart WHERE id=?";
				$bindings = array_values($valueMap);
				$bindings[] = $entity->id;

				$ok = DB::update($query, $bindings);
				if ($ok <= 0) return null;

			} else {
				// insert
				$fields = implode(', ', array_keys($valueMap));
				$fieldReplacements = implode(', ', array_fill(1, count($valueMap), '?'));

				$query = "INSERT INTO users ($fields) VALUES ($fieldReplacements)";
				$bindings = array_values($valueMap);

				$id = $this->insertAndGetId($query, $bindings);
				if (!$id) return null;
				$entity->id = $id;
			}
		} catch (\Throwable $e) {
			\Log::error($e->getMessage(), [__FILE__, __LINE__, $e->getFile(), $e->getLine()]);
			return null;
		}

		return $entity;
	}

}
