<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $sex)
    {
        if ($request->input('age')>10 && $sex==$request->input('sex')) {
            return $next($request);
        }
        return redirect()->route('ageRefuce');
    }
}
