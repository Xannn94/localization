<?php namespace Xannn94\Localization\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class     Localization
 *
 * @package  Xannn94\Localization\Facades
 * @author   Xannn94 <axiles94@gmail.com>
 */
class Localization extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'xannn94.localization';
    }
}
