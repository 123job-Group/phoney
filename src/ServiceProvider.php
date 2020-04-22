<?php

namespace Dmyers\Phoney;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @see https://raw.githubusercontent.com/typpo/textbelt/master/lib/carriers.js
 * @see https://raw.githubusercontent.com/typpo/textbelt/master/lib/providers.js
 * @see https://github.com/mfitzp/List_of_SMS_gateways
 * @see https://github.com/laravel-notification-channels/twilio/tree/master/src
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $this->app->when(Channel::class)
            ->needs(Pusher::class)
            ->give(function () {
                $pusherConfig = config('broadcasting.connections.pusher');

                return new Pusher(
                    $pusherConfig['key'],
                    $pusherConfig['secret'],
                    $pusherConfig['app_id']
                );
            });
         */
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Phoney::class, function () {
            return new Phoney;
        });

        $this->app->alias(Phoney::class, 'phoney');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'phoney',
            Phoney::class,
        ];
    }
}
