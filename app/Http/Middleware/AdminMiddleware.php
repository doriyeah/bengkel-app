<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        if (\Auth::user()->type=='admin'){
            return $next($request);
        }
        elseif (\Auth::user()->type=='pegawai'){
            return $next($request);
        }
        else{
            return redirect('/');
        }

    }
}
