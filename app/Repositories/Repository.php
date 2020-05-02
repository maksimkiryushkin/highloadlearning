<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository {

	public function find($id);

	public function search($conditions);

	public function save($entity);

	//public function remove($entity);

}
