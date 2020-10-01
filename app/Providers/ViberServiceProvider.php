<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Viber\Bot;

class ViberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Bot::class, function () {
            $token = config('bot.viber_bot_api_key');
            return new Bot(['token' => $token]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
