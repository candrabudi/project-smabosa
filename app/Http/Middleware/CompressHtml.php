<?php

namespace App\Http\Middleware;

use Closure;

class CompressHtml
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $output = $response->getContent();

            // Remove extra spaces, tabs, and newlines
            $output = preg_replace('/\s+/', ' ', $output);

            $response->setContent($output);
        }

        return $response;
    }
}
