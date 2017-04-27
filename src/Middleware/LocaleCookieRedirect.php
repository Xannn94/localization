<?php namespace Xannn94\Localization\Middleware;

use Xannn94\Localization\Bases\Middleware;
use Closure;
use Illuminate\Http\Request;

/**
 * Class     LocaleCookieRedirect
 *
 * @package  Xannn94\Localization\Middleware
 * @author   Xannn94 <axiles94@gmail.com>
 *
 * @todo:    Refactoring
 */
class LocaleCookieRedirect extends Middleware
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $segment = $request->segment(1, null);
        $locale  = $request->cookie('locale', null);

        if (localization()->isLocaleSupported($segment)) {
            return $next($request)->withCookie(cookie()->forever('locale', $segment));
        }

        if ($locale !== null && ! $this->isDefaultLocaleHidden($locale)) {
            if ( ! is_null($redirect = $this->getLocalizedRedirect($locale))) {
                return $redirect->withCookie(cookie()->forever('locale', $segment));
            }
        }

        return $next($request);
    }
}
