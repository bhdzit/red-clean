<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerifyIsAdmin
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
        if(auth()->user()->esAdmin()){
            return $next($request);
        }

        return $request->wantsJson()
            ? new JsonResponse([], 403)
            : redirect()->route("ventas.index");

    }
}
