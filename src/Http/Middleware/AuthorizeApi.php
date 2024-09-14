<?php

namespace Azzarip\Client\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->getUser();
        $password = $request->getPassword();
        if ($username != config('client.response.username') || $password != config('client.response.password')) {
            return response()->json(['error' => 'Authentication Error.'], 401);
        }

        return $next($request);
    }
}
