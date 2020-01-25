<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
	/*protected $auth;
	
	public function __construct( Guard $auth ){
		$this->auth= $auth;
	}*/
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            } else {
                return redirect('/login');
            }
        }
		
        return $next($request);
    }
}