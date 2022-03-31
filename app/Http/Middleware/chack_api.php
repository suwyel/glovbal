<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class chack_api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($request->api_key == '') {
            return response()->json(['status' => 'false', 'message' => 'Please provide Api Key!']);
            exit();
        } else {
            if ($request->api_key == ENV('API_KEY')) {
                return $next($request);
            } else {
                return response()->json(['status' => 'false', 'message' => 'Invalid Api Key!']);
                exit();
            }
        }
    }
}
