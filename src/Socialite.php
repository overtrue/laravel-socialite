<?php

namespace Overtrue\LaravelSocialite;

use Illuminate\Support\Facades\Facade;

/**
 * Class Socialite.
 */
class Socialite extends Facade
{
    /**
     * Return the facade accessor.
     *
     * @return string
     */
    static public function getFacadeAccessor()
    {
        return "overtrue.socialite";
    }
}