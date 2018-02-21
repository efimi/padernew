<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Social\FacebookAccountWasLinked' => [
            'App\Listeners\Social\SendFacebookLinkedEmail',
        ],
        'App\Events\Match\UserWasMatchedToLocation' => [
            'App\Listeners\Match\SendUserMatchedToLocationEmail'
        ],
        'App\Events\Match\LocationWasFilled' => [
            'App\Listeners\Match\SendLocationFilledEmail'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
