<?php

namespace App\Repositories;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Repository {

	/** @var Model */
	protected $model;
	/** @var string */
	protected $table;

	public function __construct(Model $model, $table) {
		$this->model = $model;
		$this->table = (string)$table;
	}

	/**
	 * @param int $id
	 * @return Model
	 */
	public function find($id) {
		$items = $this->search(['id' => (int)$id], null, 1);
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
		if (!is_array($conditions) && !empty($conditions)) {
			$conditions = [$conditions];
		}
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

			$items = DB::select("SELECT * FROM {$this->table} $where $order $limit $offset", $bindings);

		} catch (\Throwable $e) {
			\Log::error($e->getMessage(), [$this->table, __FILE__, __LINE__, $e->getFile(), $e->getLine()]);
			return null;
		}

		$result = new Collection();
		foreach ($items as $item) {
			$instance = $this->model->newFromBuilder($item);
			$result->push($instance);
		}

		return  $result;
	}

	/**
	 * @param Model $entity
	 * @return Model|null
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

				$query = "UPDATE {$this->table} SET $fieldsPart WHERE id=?";
				$bindings = array_values($valueMap);
				$bindings[] = $entity->id;

				$ok = DB::update($query, $bindings);
				if ($ok <= 0) return null;

			} else {
				// insert
				$fields = implode(', ', array_keys($valueMap));
				$fieldReplacements = implode(', ', array_fill(1, count($valueMap), '?'));

				$query = "INSERT INTO {$this->table} ($fields) VALUES ($fieldReplacements)";
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

	//public function remove($entity);

	protected function insertAndGetId($query, $bindings = []) {
		$ok = DB::insert($query, $bindings);
		if (!$ok) return false;
		$id = DB::getPdo()->lastInsertId();
		return is_numeric($id) ? (int)$id : $id;
	}

}
