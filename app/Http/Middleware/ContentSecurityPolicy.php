<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $nonce = base64_encode(random_bytes(16));
        $csp = "script-src 'self' 'nonce-{$nonce}';";

        $response->headers->set('Content-Security-Policy', $csp);

        // Pass the nonce to the view
        view()->share('nonce', $nonce);

        return $response;
    }
}
