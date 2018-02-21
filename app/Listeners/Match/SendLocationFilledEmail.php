<?php

namespace App\Listeners\Match;

use App\Events\Match\LocationWasFilled;
use App\Mail\User\LocationFilled;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendLocationFilledEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LocationWasFilled  $event
     * @return void
     */
    public function handle(LocationWasFilled $event)
    {   
        foreach ($event->users as $u) {
            Mail::to($u)->send(new LocationFilled($u, $event->location));
        }
    }

}
