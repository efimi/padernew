<?php

namespace App\Mail\User;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMatchedToLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $location;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->location = $user->matchedLocation();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Viel Spass bei '. $this->location->name .'😀')->markdown('email.user.matchedToLocation')
            ->with([
            'user' => $this->user,
            'location' => $this->location,
            ]);
    }
}
