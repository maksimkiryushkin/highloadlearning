<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository {

	public function find($id);

	public function search($conditions = [], $order = null, $limit = null, $offset = null);

	public function save($entity);

	//public function remove($entity);

}
