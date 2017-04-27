<?php namespace Xannn94\Localization\Middleware;

use Xannn94\Localization\Bases\Middleware;
use Closure;
use Illuminate\Http\Request;

/**
 * Class     LocalizationRoutes
 *
 * @package  Xannn94\Localization\Middleware
 * @author   Xannn94 <axiles94@gmail.com>
 */
class LocalizationRoutes extends Middleware
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
        localization()->setRouteNameFromRequest($request);

        return $next($request);
    }
}
