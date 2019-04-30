<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param $role
	 * @param null $permission
	 *
	 * @return mixed
	 */
    public function handle($request, Closure $next, $role, $permission = null)
    {
	/**
	 * Fix for "Call to a member function hasRole() on null".
	 * If the user is not logged in, there is no user data to process,
	 * so we need to throw 404 code.
	 */
	if(is_null($request->user())){
            abort(404);
        }
	    
    	if(!$request->user()->hasRole($role)) {
			abort(404);
	    }
	if($permission !== null && !$request->user()->can($permission)) {
		abort(404);
	}
        return $next($request);
    }
}
