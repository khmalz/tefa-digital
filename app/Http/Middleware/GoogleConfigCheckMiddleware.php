<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoogleConfigCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $canGoogleLogin = config('services.google.client_id') && config('services.google.client_secret');

        abort_if(! $canGoogleLogin, 403, 'Google configuration is missing.');

        return $next($request);
    }
}
