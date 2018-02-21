<?php

namespace App\Listeners\Match;

use App\Events\Match\UserWasMatchedToLocation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendUserMatchedToLocationEmail
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
     * @param  UserWasMatchedToLocation  $event
     * @return void
     */
    public function handle(UserWasMatchedToLocation $event)
    {   
        Mail::to($event->user)->send(new \App\Mail\User\UserMatchedToLocation($event->user));
    }
}
