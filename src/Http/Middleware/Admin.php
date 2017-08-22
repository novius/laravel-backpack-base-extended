<?php

namespace Novius\Backpack\Base\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class Admin
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
        // Keep code from : \Backpack\Base\app\Http\Middleware\Admin
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login');
            }
        }

        // Custom code for admin locales

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
