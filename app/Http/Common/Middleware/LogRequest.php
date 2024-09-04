<?php

namespace App\Http\Common\Middleware;

use Closure;
class LogRequest
{
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $response = $next($request);

        $endMemory = memory_get_usage();
        $duration = microtime(true) - $startTime;

        $memoryUsage = ($endMemory - $startMemory) / 1024;

        $response->headers->set('X-Debug-Time', $duration);
        $response->headers->set('X-Debug-Memory', $memoryUsage . 'Kb');
        return $response;
    }
}
