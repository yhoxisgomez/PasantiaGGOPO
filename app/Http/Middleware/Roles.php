<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Roles
{

    public function handle($request, Closure $next, ...$rol)
    {
        if(in_array (auth()->user()->rol_id,$rol )){
            return $next($request);
        }
        return redirect()->route('home');
        //return response()->json(['error'=>'Unauthorized'],401);
               //redirect('errors.unauthorized');


    }
}
