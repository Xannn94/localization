<?php namespace Xannn94\Localization\Exceptions;

/**
 * Class     UndefinedSupportedLocalesException
 *
 * @package  Xannn94\Localization\Exceptions
 * @author   Xannn94 <axiles94@gmail.com>
 */
class UndefinedSupportedLocalesException extends LocalizationException
{
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    public function __construct()
    {
        parent::__construct('Supported locales must be defined.');
    }
}
