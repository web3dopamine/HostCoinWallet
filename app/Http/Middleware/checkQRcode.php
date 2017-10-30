<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class checkQRcode
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
        
        $user = Auth::user(); 
        
        $key = $request->route('key');
        
        if (empty($user) || empty($key) || $user->secret_key != $key) {
            return redirect('/login');
        }
        return $next($request);
    }
}
