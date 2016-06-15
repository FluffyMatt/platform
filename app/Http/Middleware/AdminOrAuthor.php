<?php

namespace App\Http\Middleware;

use Closure;

class AdminOrAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->user()->admin && !$request->user()->editor) {
			if ($request->ajax()) {
					return response('Access denied', 403);
			} else {
					abort(403, 'Access denied');
			}
		}

        return $next($request);
    }
}
