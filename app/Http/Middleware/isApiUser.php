<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isApiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('access_token')) {
            if ($request->access_token != null) {
                $user = User::where('access_token', $request->access_token)->first();
                if ($user != null) {
                    return $next($request);
                } else {
                    $error = 'Token is not correct';
                    return response()->json($error);
                }
            } else {
                $error = ' access token can not be empty';
                return response()->json($error);
            }
        } else {
            $error = 'please enter your access token';
            return response()->json($error);
        }
    }
}
