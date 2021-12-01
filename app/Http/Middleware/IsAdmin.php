<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{



    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->user()->role);
         if(auth()->user()->role_id == '3'){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
