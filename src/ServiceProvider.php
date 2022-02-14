<?php

namespace Overtrue\LaravelSocialite;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Overtrue\Socialite\SocialiteManager;

class ServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(SocialiteManager::class, function () {
            $config = array_merge(\config('socialite', []), \config('services', []));

            return new SocialiteManager($config);
        });
    }

    public function provides()
    {
        return [SocialiteManager::class];
    }
}
