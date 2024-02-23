<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProjectOwnerOrAdmin
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
        $project = $request->route('project'); 
        
        if (Auth::user()->id != $project->user_id && Auth::user()->role != 'admin') {
            abort(403, 'I don\'t know if you are lost<br>or just hacking the page.');
        }

        return $next($request);
    }
}

