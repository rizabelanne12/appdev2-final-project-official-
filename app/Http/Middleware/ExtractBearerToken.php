<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtractBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if(!$token){
             return response()->json(["error" => "Unauthorized Users"], 401);
        };

        if($token !== env('BEARER_TOKEN')){
            return response()->json(["error" => "Forbidden"], 403);
        };

        
        // return response()->json($token);

        return $next($request);
    }
}
