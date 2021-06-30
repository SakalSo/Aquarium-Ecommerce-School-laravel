<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        //might need a try catch here for non staff user
        if(auth()->user()->staff->is_admin) {
            return $next($request);
        }
        return redirect('home');
    }
}
