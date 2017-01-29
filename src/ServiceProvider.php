<?php

namespace Overtrue\LaravelSocialite;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Overtrue\Socialite\SocialiteManager;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->app->singleton(SocialiteManager::class, function ($app) {
            $config = array_merge(config('socialite', []), config('services', []));

            return new SocialiteManager($config, $app->make('request'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SocialiteManager::class];
    }
}
