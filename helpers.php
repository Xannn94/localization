<?php

if ( ! function_exists('localization')) {
    /**
     * Get the Localization instance.
     *
     * @return \Xannn94\Localization\Localization
     */
    function localization()
    {
        return app('xannn94.localization');
    }
}
