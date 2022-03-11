<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyMiddle
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
        if($request->session()->has('name')){
            return $next($request);
        }
        else{
            return redirect('login');
        }
        
    }
}
