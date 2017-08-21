<?php

namespace Novius\Backpack\Base\Http\Middleware;

class LocaleFromCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, \Closure $next, $guard = null)
    {
        // Stores locale in a cookie and reloads the page
        $setLocale = $request->input('admin_locale');
        if (!empty($setLocale)) {
            return redirect(\Request::url())->withCookie(cookie('admin_locale', $setLocale));
        }

        // Sets the current locale from the cookie
        $locale = $request->cookie('admin_locale');
        if (!empty($locale)) {
            \App::setLocale($locale);
        }

        return $next($request);
    }
}
