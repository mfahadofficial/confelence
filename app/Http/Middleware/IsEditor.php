<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEditor
{


    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role_id == '2'){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}

