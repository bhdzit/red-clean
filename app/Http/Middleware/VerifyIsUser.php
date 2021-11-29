<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerifyIsUser
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
        if(auth()->user()->esUser()){
            return $next($request);
        }

        return $request->wantsJson()
            ? new JsonResponse([], 403)
            : redirect()->route("dashboard");

    }
}
