<?php

namespace App\Providers;

use App\Match;
use Illuminate\Support\ServiceProvider;

class MatchMakeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Match::observe(\App\Observers\MatchObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
