<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        //neu session key rong(zo lan 1)
        if(empty(session('key')))
        {
           session(['key'=>'1']);
           return redirect('login');
        }
        //neu session key khong rong (zo lan 2 tro len)
        return $next($request);
    }
}
