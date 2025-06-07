<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class checkAuthenticate
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
        if(!isset(Auth::guard('admin')->user()->id)){
    		return redirect()->route('admin_login');	
    	}
        return $next($request);

        // if(Auth::check()){
            
        //     return $next($request);
    		
    	// }
        // return redirect()->route('admin_login');
        // return $next($request);
    }
}
