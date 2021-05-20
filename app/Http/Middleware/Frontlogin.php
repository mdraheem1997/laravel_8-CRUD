<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Frontlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check())
        {
            $message = "Please login and start your session";
            $request->Session()->flash('error_message',$message);
            return redirect('/login');
        }
        return $next($request);
    }
}
