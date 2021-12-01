<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsViewer
{



    public function handle(Request $request, Closure $next)
    {

        // dd(auth()->user()->role_id);
        if(auth()->user()->role_id == '1'){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
