<?php namespace Xannn94\Localization\Providers;

use Xannn94\Localization\Utilities\LocalesManager;
use Xannn94\Localization\Utilities\Negotiator;
use Xannn94\Localization\Utilities\RouteTranslator;
use Xannn94\Support\ServiceProvider;

/**
 * Class     UtilitiesServiceProvider
 *
 * @package  Xannn94\Localization\Providers
 * @author   Xannn94 <axiles94@gmail.com>
 */
class UtilitiesServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRouteTranslator();
        $this->registerLocalesManager();
        $this->registerLocaleNegotiator();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Utilities
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register RouteTranslator utility.
     */
    private function registerRouteTranslator()
    {
        $this->app->singleton('xannn94.localization.translator', function ($app) {
            /** @var  \Illuminate\Translation\Translator  $translator */
            $translator = $app['translator'];

            return new RouteTranslator($translator);
        });
    }

    /**
     * Register LocalesManager utility.
     */
    private function registerLocalesManager()
    {
        $this->app->singleton('xannn94.localization.locales-manager', function ($app) {
            return new LocalesManager($app);
        });
    }

    /**
     * Register LocaleNegotiator utility.
     */
    private function registerLocaleNegotiator()
    {
        $this->app->bind('xannn94.localization.negotiator', function ($app) {
            /**  @var LocalesManager $localesManager  */
            $localesManager = $app['xannn94.localization.locales-manager'];

            return new Negotiator(
                $localesManager->getDefaultLocale(),
                $localesManager->getSupportedLocales()
            );
        });
    }
}
