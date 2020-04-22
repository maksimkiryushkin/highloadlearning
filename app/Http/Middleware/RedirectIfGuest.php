<?php

namespace App\Http\Middleware;

use App\ExecutionContext;
use Closure;
use Illuminate\Http\Request;

class RedirectIfGuest {

	protected $guestPages = [
		'welcome',
		'register',
		'login',
		'logout',
	];

	protected $guestRedirectTo = 'welcome';

	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!$request->is($this->guestPages) && !ExecutionContext::getUser()) {
			return redirect($this->guestRedirectTo);
		}
		return $next($request);
	}
}
