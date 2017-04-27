<?php namespace Xannn94\Localization\Routing;

use Illuminate\Routing\ResourceRegistrar as IlluminateResourceRegistrar;

/**
 * Class     ResourceRegistrar
 *
 * @package  Xannn94\Localization\Routing
 * @author   Xannn94 <axiles94@gmail.com>
 */
class ResourceRegistrar extends IlluminateResourceRegistrar
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the resource name for a grouped resource.
     *
     * @param  string  $prefix
     * @param  string  $resource
     * @param  string  $method
     * @return string
     */
    protected function getGroupResourceName($prefix, $resource, $method)
    {
        $currentLocale = localization()->getCurrentLocale();
        $group         = trim(str_replace('/', '.', $this->router->getLastGroupPrefix()), '.');
        $group         = str_replace($currentLocale . '.', '', $group);

        if ( ! empty($group) && $group !== $currentLocale) {
            return trim("{$prefix}{$group}.{$resource}.{$method}", '.');
        }

        return trim("{$prefix}{$resource}.{$method}", '.');
    }
}
