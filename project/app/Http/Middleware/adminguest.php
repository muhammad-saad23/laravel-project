<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminguest
{
    /**
     * Handle an incoming request.
     *     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse

     */
    public function handle(Request $request, Closure $next ): Response
    {
        if (Auth::check()) {
            return redirect('admin-panel/dashboard');
        }
            
            return $next($request);
        
        
    }
}
