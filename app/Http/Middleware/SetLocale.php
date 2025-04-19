<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{

public function handle($request, Closure $next)
{
    // URL'den dili al (örn: /en/...)
    $locale = $request->route('lang') 
              ?? $request->cookie('locale')
              ?? config('app.locale');

    if (!in_array($locale, ['tr', 'en', 'ru'])) {
        $locale = config('app.locale');
    }

    app()->setLocale($locale);
    return $next($request);
}
}