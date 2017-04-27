<?php namespace Xannn94\Localization\Contracts;

/**
 * Interface  RouteBindable
 *
 * @package   Xannn94\Localization\Contracts
 * @author    Xannn94 <axiles94@gmail.com>
 */
interface RouteBindable
{
    /**
     * Get the wildcard value from the class.
     *
     * @return int|string
     */
    public function getWildcardValue();
}
