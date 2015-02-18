<?php namespace Dokoiko\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Redirect;

class SuperAdmin implements Middleware {

	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!$this->auth->check() || $this->auth->user()->privileges != 'super') {
			return Redirect::action('AdminController@getIndex')
				->withErrors([
					'error' => 'Only super administrator can go there.'
				]);
		}
		return $next($request);
	}
}
