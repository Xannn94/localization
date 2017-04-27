<?php namespace Xannn94\Localization;

use Xannn94\Support\PackageServiceProvider;

/**
 * Class     LocalizationServiceProvider
 *
 * @package  Xannn94\Localization
 * @author   Xannn94 <axiles94@gmail.com>
 */
class LocalizationServiceProvider extends PackageServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Vendor name.
     *
     * @var string
     */
    protected $vendor   = 'xannn94';

    /**
     * Package name.
     *
     * @var string
     */
    protected $package  = 'localization';

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    public function getBasePath()
    {
        return dirname(__DIR__);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerConfig();

        $this->app->register(Providers\RoutingServiceProvider::class);
        $this->app->register(Providers\UtilitiesServiceProvider::class);
        $this->registerLocalization();
        $this->registerAliases();
    }

    /**
     * Boot the package.
     */
    public function boot()
    {
        parent::boot();

        $this->publishConfig();
        $this->publishViews();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['xannn94.localization'];
    }

    /* ------------------------------------------------------------------------------------------------
     |  Services Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register Localization.
     */
    private function registerLocalization()
    {
        $this->singleton('xannn94.localization', function($app) {
            /**
             * @var  Contracts\RouteTranslatorInterface  $routeTranslator
             * @var  Contracts\LocalesManagerInterface   $localesManager
             */
            $routeTranslator = $app['xannn94.localization.translator'];
            $localesManager  = $app['xannn94.localization.locales-manager'];

            return new Localization($app, $routeTranslator, $localesManager);
        });

        $this->alias(
            $this->app['config']->get('localization.facade', 'Localization'),
            Facades\Localization::class
        );
    }
}
