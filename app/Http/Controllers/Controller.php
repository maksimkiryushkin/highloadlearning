<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	function responseJsonSuccessMessageURL($message, $url) {
		return $this->responseJsonSuccess([
			'message' => (string)$message,
			'url' => (string)$url,
		]);
	}

	function responseJsonSuccessMessage($message) {
		return $this->responseJsonSuccess([
			'message' => (string)$message,
		]);
	}

	function responseJsonSuccess($data) {
		if (!is_array($data)) $data = [];
		$data['status'] = 'success';
		return response()->json($data);
	}

	function responseJsonError($reason, $code = 0) {
		return response()->json(['status' => 'error', 'reason' => (string)$reason, 'code' => $code]);
	}

}
