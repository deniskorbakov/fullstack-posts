<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use App\Services\UserAgentDetector;
use Illuminate\Http\Request;
use Closure;

class LogRequestData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userAgentDetector = new UserAgentDetector($request);

        $userAgentDetector->saveDataLoginInformation();

        return $next($request);
    }
}
