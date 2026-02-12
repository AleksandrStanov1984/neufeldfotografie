<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $available = collect(File::directories(lang_path()))
            ->map(fn ($path) => basename($path))
            ->values()
            ->toArray();

        $fallback = config('app.locale');

        // 1) приоритет: query ?lang=
        $fromQuery = $request->query('lang');

        // 2) затем session
        $fromSession = session('locale');

        $locale = $fromQuery ?: ($fromSession ?: $fallback);

        if (!in_array($locale, $available, true)) {
            $locale = $fallback;
        }

        // если пришло из query и валидно — запоминаем в session
        if ($fromQuery && $locale === $fromQuery) {
            session(['locale' => $locale]);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
