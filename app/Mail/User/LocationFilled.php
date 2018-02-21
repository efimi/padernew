<?php

namespace App\Mail\User;

use App\Location;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LocationFilled extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $location;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Location $location)
    {   
        $this->user = $user;
        $this->location = $location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->subject('Deine Location ist voll 🙋')->markdown('email.user.locationFilled')
                ->with(['user' => $this->user, 'location' => $this->location ]);
    }
}
