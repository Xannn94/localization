<?php namespace Xannn94\Localization\Traits;

/**
 * Class     LocalizationKernelTrait
 *
 * @package  Xannn94\Localization\Traits
 * @author   Xannn94 <axiles94@gmail.com>
 *
 * @property  \Illuminate\Foundation\Application      app
 * @property  \Xannn94\Localization\Routing\Router  router
 * @property  array                                   middlewareGroups
 * @property  array                                   routeMiddleware
 */
trait LocalizationKernelTrait
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the route dispatcher callback.
     *
     * @return \Closure
     */
    protected function dispatchToRouter()
    {
        $this->router = $this->app['router'];

        $this->registerMiddlewareGroups();
        $this->registerMiddleware();

        return parent::dispatchToRouter();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Middleware Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register middleware groups to router (since Laravel 5.2)
     */
    protected function registerMiddlewareGroups()
    {
        if (property_exists($this, 'middlewareGroups')) {
            foreach ($this->middlewareGroups as $key => $middleware) {
                $this->router->middlewareGroup($key, $middleware);
            }
        }
    }

    /**
     * Register middleware to router
     */
    protected function registerMiddleware()
    {
        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->router->middleware($key, $middleware);
        }
    }
}
