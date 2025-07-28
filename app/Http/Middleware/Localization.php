<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check URL for explicit locale first
        if ($request->has('lang')) {
            $locale = $request->input('lang');
            if (in_array($locale, config('app.available_locales'))) {
                session()->put('locale', $locale);
            }
        }

        // 2. Check session for stored preference
        $locale = session()->get('locale', config('app.locale'));

        // 3. Set application locale
        app()->setLocale($locale);

        return $next($request);
    }
}
