<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = config('app.supported_locales', ['en']); // Default to English if not defined

        $locale = $request->header('lang');

        if ($locale && in_array($locale, $supportedLocales)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale('en'); // Default to English if locale is not valid
        }

        return $next($request);
    }
}
