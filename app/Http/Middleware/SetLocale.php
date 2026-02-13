<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $available  = config('site_sections.locales.available', []);
        $fallback   = config('site_sections.locales.fallback', config('app.locale', 'de'));
        $queryKey   = config('site_sections.locales.query_key', 'lang');
        $sessionKey = config('site_sections.locales.session_key', 'locale');

        // 1) priority: query
        $fromQuery = $request->query($queryKey);

        // 2) then session
        $fromSession = session($sessionKey);

        $locale = $fromQuery ?: ($fromSession ?: $fallback);

        if (!in_array($locale, $available, true)) {
            $locale = $fallback;
        }

        // если query валиден — сохраняем
        if ($fromQuery && $locale === $fromQuery) {
            session([$sessionKey => $locale]);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
