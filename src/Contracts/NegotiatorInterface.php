<?php namespace Xannn94\Localization\Contracts;

use Illuminate\Http\Request;

/**
 * Interface  NegotiatorInterface
 *
 * @package   Xannn94\Localization\Contracts
 * @author    Xannn94 <axiles94@gmail.com>
 */
interface NegotiatorInterface
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Negotiate the request.
     *
     * @param  Request  $request
     *
     * @return string
     */
    public function negotiate(Request $request);
}
