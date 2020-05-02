<?php

namespace App\Repositories;

use DB;

trait InsertAndGetId {

	protected function insertAndGetId($query, $bindings = []) {
		$ok = DB::insert($query, $bindings);
		if (!$ok) return false;
		$id = DB::getPdo()->lastInsertId();
		return is_numeric($id) ? (int)$id : $id;
	}

}
